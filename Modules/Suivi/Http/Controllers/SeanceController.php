<?php

namespace Modules\Suivi\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Suivi\Entities\Etape;
use Modules\Suivi\Entities\Evenement;
use Modules\Suivi\Entities\EvenementType;
use Modules\Suivi\Entities\Seance;
use Modules\Suivi\Entities\SeanceCandidat;
use Modules\Suivi\Entities\SeanceCoach;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    //tous les séances confondus
    public function index()
    {
        $parcours = Seance::where('etat', 1)->paginate(6);
        $type_event = EvenementType::all();
        $view = 'all';
        $pages = 'visible';
        return view('suivi::back.event.index',compact('parcours','type_event','view', 'pages'));
    }
    //trier par évemenent type 
    public function index_tri($item)
    {
        $parcours = Seance::all()->where('etat', 1)->where('evenement_type_id', $item);        
        $type_event = EvenementType::all();
        $view = $item;
        $pages = 'visible';
        return view('suivi::back.event.index', compact('parcours','type_event','view', 'pages'));
    }

    //voir les archives et trier 
    public function archive()
    {
        $parcours = Seance::where('etat', 0)->paginate(6);
        $type_event = EvenementType::withTrashed()->get();
        $view = 'all';
        $pages = 'archives';
        // return dd($pages);
        return view('suivi::back.event.archive', compact('parcours','type_event','view', 'pages'));
    }

    public function archive_tri($item)
    {
        $parcours = Seance::all()->where('etat', 0)->where('evenement_type_id', $item);        
        $type_event = EvenementType::withTrashed()->get();
        $view = $item;
        $pages = 'archives';
        return view('suivi::back.event.archive', compact('parcours','type_event','view', 'pages'));
    }

    //archiver une séance ou le remettre visible
    public function finSeance(Seance $id)
    {
        $seance = $id;
        switch ($seance->etat) {
            case '1':
                $seance->etat = 0;
                $seance->save();
                return redirect()->route('event.index')->with('warning', "La séance a été archivé");        
                break;
            case '0':
                $type = $seance->evenement_type;
                if ($type->trashed()) {
                    $type->restore();
                }
                $seance->etat = 1;
                $seance->save();
                return redirect()->route('event.index')->with('success', "La séance est public");        
                break;
            default:
                break;
        }
    }
    
    //cloturer une séance avant le nbre limite
    public function cloture(Seance $id)
    {
        $seance = $id;
        $seance->max = $seance->max - $seance->limite;
        $seance->limite = 0;
        $seance->save();
        return redirect()->back()->with('warning', 'séance clôturée');
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $formations = Evenement::all();
        return view('suivi::back.event.create', compact('formations'));
    }

    public function createSecondStep(Request $request)
    {

        if ($request->type == 1) {
            $coachs = User::all()->where('role_id', 2);
            $etapes = Etape::where('evenement_id', $request->type)->get();
            return view('suivi::back.event.createSchool', compact('etapes','coachs'));
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $carbon = Carbon::now();
        $date_du_jour = $carbon->isoFormat('DD-MM-YYYY');

        $request->validate([
            "nom"=>"required|string",
            "date_debut"=>'required|date|after:'.$date_du_jour,
            "date_fin"=>'required|date|after_or_equal:date_debut',
            "heure_debut"=>'required',
            "heure_fin"=>'required',
            'limite'=>"required|integer",
            'etape'=>"required|integer",
            'lieu'=>'required',
        ]);
        $et = new EvenementType();
        $et->nom = $request->nom;
        $et->evenement_id = $request->evenement;
        $et->save();


        $seance = new Seance();
        $seance->date_debut = Carbon::createFromFormat('Y-m-d',$request->date_debut ) ;
        $seance->date_fin = Carbon::createFromFormat('Y-m-d',$request->date_fin );
        $seance->heure_debut = $request->heure_debut;
        $seance->heure_fin = $request->heure_fin;
        $seance->limite = $request->limite;
        $seance->lieu = $request->lieu;
        $seance->etat = $request->etat;
        $seance->max = $request->limite;
        $seance->evenement_type_id = $et->id;
        $seance->etape_id = $request->etape;
        $seance->save();

        if ($request->coach != null) {
            $coach_week = new SeanceCoach();
            $coach_week->user_id = $request->coach;
            $coach_week->seance_id = $seance->id;
            $coach_week->save();
        }

        return redirect()->route('event.index')->with('success', 'Nouvelle type de formation créée ');

    }

    public function createSeance(EvenementType $id)
    {
        $evenementType = $id;
        $etapes = Etape::where('evenement_id',$evenementType->evenement->id )->get();
        $coachs = User::all()->where('role_id', 5);

        return view('suivi::back.event.createSeance', compact('evenementType', 'etapes', 'coachs'));
    }

    public function storeSeance(Request $request)
    {
        $carbon = Carbon::now();
        $date_du_jour = $carbon->isoFormat('DD-MM-YYYY');
        $request->validate([
            "date_debut"=>'required|date|after:'.$date_du_jour,
            "date_fin"=>'required|date|after_or_equal:date_debut',
            "heure_debut"=>'required',
            "heure_fin"=>'required',
            'limite'=>"required|integer",
            'etat'=>'required|integer',
            'etape'=>"required|integer",
            'lieu'=>'required',
        ]);

        $seance = new Seance();
        $seance->date_debut = $request->date_debut;
        $seance->date_fin = $request->date_fin;
        $seance->heure_debut = $request->heure_debut;
        $seance->heure_fin = $request->heure_fin;
        $seance->limite = $request->limite;
        $seance->lieu = $request->lieu;
        $seance->etat = $request->etat;
        $seance->max = $request->limite;
        $seance->evenement_type_id = $request->evenement;
        $seance->etape_id = $request->etape;
        $seance->save();
        if ($request->coach != null) {
            $coach_week = new SeanceCoach();
            $coach_week->user_id = $request->coach;
            $coach_week->seance_id = $seance->id;
            $coach_week->save();
        }
        return redirect()->route('event.index')->with('success', 'Nouvelle séance créée');

    }
    public function editSeance(Seance $id)
    {
        $etapes = Etape::where('evenement_id', 1)->get();
        $seance = $id;
        return view('suivi::back.event.editSeance', compact('etapes', 'seance'));
    }

    public function updateSeance(Request $request, Seance $id)
    {
        $carbon = Carbon::now();
        $date_du_jour = $carbon->isoFormat('DD-MM-YYYY');
        $request->validate([
            "date_debut"=>'required|date|after:'.$date_du_jour,
            "date_fin"=>'required|date|after_or_equal:date_debut',
            "heure_debut"=>'required',
            "heure_fin"=>'required',
            'limite'=>"required",
            'etape'=>"required",
            'lieu'=>'required',
        ]);
        $seance = $id;
        $seance->date_debut = $request->date_debut;
        $seance->date_fin = $request->date_fin;
        $seance->heure_debut = $request->heure_debut;
        $seance->heure_fin = $request->heure_fin;
        $seance->limite = $request->limite;
        $seance->lieu = $request->lieu;
        $seance->etat = $request->etat;
        $seance->max = $request->limite;
        $seance->evenement_type_id = $request->evenement;
        $seance->etape_id = $request->etape;
        $seance->save();
        return redirect()->route('event.index');

    }

    public function destroySeance(Seance $id)   
    {
        $seance = $id;
        $seance->delete();
        return redirect()->back();
    }

    //liste des candidats inscrits au seance
    public function etudiants(Seance $id)
    {
        $seance = $id;
        $seances = Seance::all()->where('etape_id', 3);
        $seance_user = SeanceCandidat::all()->where('seance_id', $seance->id);
        return view('suivi::back.event.listeCandidat',compact('seance','seance_user','seances'));
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('suivi::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('suivi::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}

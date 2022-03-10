<?php

namespace Modules\Suivi\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Suivi\Entities\Candidat;
use Modules\Suivi\Entities\CandidatInfo;
use Modules\Suivi\Entities\Commentaire;
use Modules\Suivi\Entities\Genre;
use Modules\Suivi\Entities\Seance;
use Modules\Suivi\Entities\SeanceCandidat;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $current_view = 'all';
        $etudiants = Candidat::paginate(8);
        $recherche = '';
        return view('suivi::back.candidat.index', compact('etudiants', 'current_view', 'recherche'));
    }
    public function index_candidat()
    {
        $current_view = 'candidat';
        $etudiants = Candidat::orderBy('nom')->where('role_id', 1)->paginate(8);
        $recherche = '';
        return view('suivi::back.candidat.index', compact('etudiants', 'current_view', 'recherche'));
    }

    public function index_etudiant()
    {
        $current_view = 'etudiant';
        $etudiants = Candidat::orderBy('nom')->where('role_id', 2)->paginate(8);
        $recherche = '';
        return view('suivi::back.candidat.index', compact('etudiants', 'current_view', 'recherche'));
    }

    public function search(Request $request)
    {
        request()->validate([
            "search" => "required",
        ]);
        $current_view = 'recherche';
        $recherche = $request->search;
        $etudiants = Candidat::orderBy('nom')->where('nom', 'LIKE', "%{$recherche}%")->orWhere('prenom', 'LIKE', "%{$recherche}%")->paginate(8);
        return view('suivi::back.candidat.index', compact('etudiants', 'current_view', 'recherche'));
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Candidat $id)
    {

        $etudiant = $id;
        return view('suivi::back.candidat.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Candidat $id)
    {
        $etudiant = $id;
        $genres = Genre::all();
        return view('suivi::back.candidat.edit', compact('etudiant', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Candidat $id, Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'naissance' => 'required|date|max:255',
            'genre' => 'required',
            'telephone' => 'required|numeric',
            'email' => 'required|string|email|max:255',
            'interet' => 'required',
            'parcours' => 'required',
            'statut' => 'required',
            'commune' => 'required',
            'adresse' => 'required',
            'pc' => 'required',
            'objectif' => 'required',
        ]);

        $candidat = Candidat::find($id)->first();
        $candidat->nom = $request->nom;
        $candidat->prenom = $request->prenom;
        $candidat->genre_id = $request->genre;
        $candidat->email = $request->email;
        $candidat->save();
        $infos = CandidatInfo::where('candidat_id', $candidat->id)->first();
        $infos->date_naissance = $request->naissance;
        $infos->phone = $request->telephone;
        $infos->motivation = $request->interet;
        $infos->statut = $request->statut;
        $infos->commune = $request->commune;
        $infos->parcours = $request->parcours;
        $infos->adresse = $request->adresse;
        $infos->pc = $request->pc;
        $infos->objectif = $request->objectif;
        $infos->save();
        return redirect()->route('etudiant.index')->with('success', 'le profil de l\'étudiant a été édité');

    }


    public function presence(Candidat $id, Seance $seance)
    {
        $user = $id;
        $seanceUser = SeanceCandidat::all()->where('seance_id', $seance->id)->where('candidat_id', $user->id)->first();
        switch ($seanceUser->presence) {
            case '0':
                $seanceUser->presence = 1;
                $seanceUser->save();
                break;
            case '1':
                $seanceUser->presence = 0;
                $seanceUser->save();
                break;
            default:
                break;
        }
        return redirect()->back();
    }


}

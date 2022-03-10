<?php

namespace Modules\Suivi\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Suivi\Entities\Candidat;
use Modules\Suivi\Entities\Commentaire;

class CommentaireController extends Controller
{


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, Candidat $candidat)
    {
        $commentaire =  new  Commentaire();
        $commentaire->auteur_id = Auth::user()->id;
        $commentaire->candidat_id = $candidat->id;
        $commentaire->sujet = $request->sujet;
        $commentaire->contenu = $request->contenu;
        $commentaire->created_at = now();
        $commentaire->save();
        return redirect()->back();
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
    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();
        return redirect()->back();
    }
}

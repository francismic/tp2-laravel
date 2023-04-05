<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\BlogPost;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiant = Etudiant::select()
        ->paginate(10);

        return view('etudiant.index', ['etudiants' => $etudiant]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $villes = Ville::all();

        return view('etudiant.create',compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required|min:2|max:50',
            'adresse' => 'required|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:etudiants',
            'birthday' => 'required|date',
            'villeId' => 'required|exists:villes,id'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'ville_id' => $request->villeId
        ]);

        return redirect(route('auth.login', $etudiant->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        $user = auth()->user(); // Obtenez l'utilisateur connecté
        $etudiant = $user->etudiant; // Obtenez l'étudiant associé à l'utilisateur
    
        return view('etudiant.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();

        return view('etudiant.edit', compact('villes'), ['etudiant' => $etudiant]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'ville_id' => $request->villeId
        ]);

            // Mettre à jour le nom de l'utilisateur correspondant
            $etudiant->user->name = $request->nom;
            $etudiant->user->save();

        return redirect(route('etudiant.show', $etudiant->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        // Supprimer l'étudiant et son foreign key dans la table utilisateur
        $etudiant->user()->delete();
        $etudiant->delete();

        Auth::logout();
        return redirect()->intended(route('auth.login'));
    }
}

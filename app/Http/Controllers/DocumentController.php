<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiant = Etudiant::find(1); // Remplacez 1 par l'ID de l'étudiant que vous voulez afficher
        $documents = Document::with('user')->paginate(10);

        return view('documents.index', compact('documents'), compact('etudiant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'file_name' => 'required|mimes:pdf,zip,doc|max:2048',
        ]);

        $fileName = $request->file('file_name')->getClientOriginalName();

        $document = Document::create([
            'title_en' => $request->title_en,
            'title_fr' => $request->title_fr,
            'file_name' => $fileName,
            'user_id' => Auth::id(),
        ]);

        Storage::disk('public')->putFileAs('documents', $request->file('file_name'), $fileName);

        return redirect()->route('documents.index')->with('success', 'Document ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        if ($document->user_id != Auth::id()) {
            return redirect()->route('documents.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer ce document');
        }

        Storage::disk('public')->delete('documents/' . $document->file);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document supprimé avec succès');
    }

    public function download(Document $document)
    {
        if ($document->user_id != Auth::id()) {
            return redirect()->route('documents.index')->with('error', 'Vous n\'êtes pas autorisé à télécharger ce document');
        }

        return Storage::download('documents/' . $document->file);
    }
}

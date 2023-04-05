<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiant = Etudiant::find(1); // Remplacez 1 par l'ID de l'étudiant que vous voulez afficher
        $blogs = BlogPost::all();
        return view('blog.index', compact('etudiant'), ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etudiant = Etudiant::find(1); // Remplacez 1 par l'ID de l'étudiant que vous voulez afficher
        return view('blog.create', compact('etudiant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:4|max:100',
            'title_fr' => 'max:100',
            'body' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blogPost = BlogPost::create([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'body' => $request->body,
            'body_fr' => $request->body_fr,
            'user_id' => Auth::User()->id,
        ]);

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {   
        $etudiant = Etudiant::find(1); // Remplacez 1 par l'ID de l'étudiant que vous voulez afficher
        return view('blog.show', compact('etudiant'), ['blogPost' => $blogPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        $etudiant = Etudiant::find(1); // Remplacez 1 par l'ID de l'étudiant que vous voulez afficher
        return view('blog.edit', compact('etudiant'), ['blogPost' => $blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:4|max:100',
            'title_fr' => 'max:100',
            'body' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blogPost->update([
            'title' => $request->title,
            'title_fr' => $request->title_fr,
            'body' => $request->body,
            'body_fr' => $request->body_fr,
        ]);

        return redirect(route('blog.show', $blogPost->id))->withSuccess('Article mis à jour avec success');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect(route('blog.index'));
    }
}
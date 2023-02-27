<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\Facade\PDF;




class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPosts = BlogPost::all();
        return view('forum.index', ['blogPosts'=>$blogPosts]);
    }

    /**
     * Show the form for creating a new resource. (pour le post)
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'titre' => 'required|min:5|max:100',
            'body' => 'required|min:5',
            'texte' => 'required|min:5',
        ]);

        $newPost = BlogPost::create([
            'title' => $request->title,
            'titre' => $request->titre,
            'body' => $request->body,
            'texte' => $request->texte,
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('forum.show', $newPost->id));
    }

    /**
     * Display the specified resource. (affiche une seule donnée)
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {
        // Il prend le modèle BlogPost et "SELECT * FROM blog_posts WHERE id = $blogPost";
        // return $blogPost;

        $user = Auth::user()->id;
        return view('forum.show', ['blogPost'=>$blogPost, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource. (pour afficher les données sélectionnées dans un formulaire)
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        return view('forum.edit', ['blogPost' => $blogPost]);
    }

    /**
     * Update the specified resource in storage. (pour faire une mise à jour dans un formulaire)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'titre' => 'required|min:5|max:100',
            'body' => 'required|min:5',
            'texte' => 'required|min:5',
        ]);

        $blogPost->update([
            'title' => $request->title,
            'titre' => $request->titre,
            'body' => $request->body,
            'texte' => $request->texte,
        ]);

        return redirect(route('forum.show', $blogPost->id));
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

        return redirect(route('forum.index'));
    }
}

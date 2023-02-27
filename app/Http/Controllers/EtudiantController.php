<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('blog.index', ['etudiants'=>$etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('blog.create', ['villes'=>$villes]);
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
            'name' => 'required|min:2|max:50',
            'adresse' => 'required|max:100',
            'ville_id' => 'required',
            'telephone' => 'required',
            'naissance' => 'required|date_format:Y-M-D|before:today',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
        ]);

        $nouveauUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $nouveauEtudiant = Etudiant::create([
            'id' => $nouveauUser->id,
            'name' => $request->name,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'naissance' => $request->naissance,
            'ville_id' => $request->ville_id
        ]);


        return redirect(route('blog.show', $nouveauUser->id, $nouveauEtudiant->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $villes = Ville::all();
        foreach ($villes as $ville) {
            if ($ville['id'] === $etudiant['ville_id']) {
                $etudiantVille = $ville['nom'];
            }
        }

        return view('blog.show', ['etudiant'=>$etudiant, 'etudiantVille'=>$etudiantVille]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        // $etudiant = Etudiant::with('ville_id')->get();
        return view('blog.edit', ['etudiant' => $etudiant, 'villes'=>$villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant, User $user)
    {
        $request->validate([
            'name' => 'required|min:2|max:50',
            'adresse' => 'required|max:100',
            'ville_id' => 'required',
            'telephone' => 'required',
            'naissance' => 'required|date_format:Y-m-d|before:today',
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $etudiant->update([
            'name' => $request->name,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'naissance' => $request->naissance,
            'ville_id' => $request->ville_id,
        ]);

        return redirect(route('blog.show', $etudiant->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect(route('blog.index'));
    }
}

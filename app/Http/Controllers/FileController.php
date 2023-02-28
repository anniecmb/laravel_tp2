<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $files = File::all();
        $files = File::select()->paginate(5);
        
        return view('file.index', ['files'=>$files, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'nom' => 'required|min:2',
            'file' => 'required|mimes:zip, doc, pdf',
        ]);
        
        // // Vérifiez si le fichier a été téléchargé avec succès
        // if ($request->hasFile('file')) {
        //     // Récupérez le fichier
            $file = $request->file('file');

            // Générez un nom unique pour le fichier
            $filename = rand().'.'.$file->getClientOriginalExtension();

            // Enregistrez le fichier sur le serveur
            $file->storeAs('public/uploads', $filename);
            $path = Storage::url('public/uploads/'.$filename);
            // $path = $filename;

            
        $newFile = File::create([
            'name' => $request->name,
            'nom' => $request->nom,
            'path_file' => $path,
            'user_id' => Auth::user()->id,
            'file_name' => $filename,
        ]);

        //     // Enregistrez le nom de fichier dans la base de données
        //     $fileModel = new File;
        //     $fileModel->name = $filename;
        //     $fileModel->save();

        //     // Retournez une réponse avec un message de succès
        //     return back()->with('success', 'File has been uploaded!');
        // }

        // // Retournez une réponse avec un message d'erreur
        // return back()->with('error', 'File upload failed!');

        return redirect(route('file.index', $newFile->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $user = Auth::user();
        return view('file.show', ['file'=>$file, 'user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource. (pour afficher les données sélectionnées dans un formulaire)
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('file.edit', ['file' => $file]);
    }

    /**
     * Update the specified resource in storage. (pour faire une mise à jour dans un formulaire)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $request->validate([
            'name' => 'required|min:2',
            'nom' => 'required|min:2',
        ]);

        $file->update([
            'name' => $request->name,
            'nom' => $request->nom,
        ]);

        return redirect(route('file.show', $file->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();

        return redirect(route('file.index'));
    }

    /**
     * Download the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function download($fileName)
    {
        $pathToFile = storage_path('app/public/uploads/'.$fileName);

        return response()->download($pathToFile);
    }
}

<?php

namespace App\Http\Controllers\Aplication;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
// use Illuminate\Http\Request;

// Trabajando con archivos en store -eliminar archivo
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->name);
        $posts = Post::where('user_id', '=', auth()->user()->id)->orderBy('id','desc')->paginate(5);
        // dd($posts->all());
        return view('aplication.posts.index', [ 'posts' => $posts]);
    }

 
    public function create()
    {
        return view('aplication.posts.create');
    }

    
    public function store(PostRequest $request)
    {
        // dd($request->validated());

        //salvar
        $post = Post::create([
            'user_id' => auth()->user()->id,
        ] + $request->validated());

        //img
        if ($request->file('file')) {
            //store() crea la carpeta 'posts' en el directorio de Store\app\public
            $post->image = $request->file('file')->store('posts','public');
            $post->save();
        }

        //retornar
        return back()->with('status','Registro creado exitosamente');
    }

   
    public function edit(Post $post)
    {
        return view('aplication.posts.edit', compact('post'));
    }

  
    public function update(PostRequest $request, Post $post)
    {
        // dd($request->validated());

        //actulizar la DB
        $post->update($request->validated());
        
        //img
        if ($request->file('file')) {
            //borrar la imagen del store
            Storage::disk('public')->delete($post->image);

            //actulizar la imagen del store
            $post->image = $request->file('file')->store('posts','public');
            $post->save();
        }
        return back()->with('status','El registro fue actualizado');

    }

    
    public function destroy(Post $post)
    {
        //borrar imagen del store
        Storage::disk('public')->delete($post->image);

        $post->delete();

        return back()->with('status','El registro fue eliminado');

    }
}

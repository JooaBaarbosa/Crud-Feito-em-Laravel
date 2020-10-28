<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class SlidersController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'link' => 'required',
            'imagem' => 'required',
            'categoria' => 'required',
        ], [
            'titulo.required' => 'Titulo é um campo obrigatorio',
            'link.required' => 'Link é um campo obrigatorio',
            'imagem.required' => 'Imagem é um campo obrigatorio',
            'categoria.required' => 'Categoria é um campo obrigatorio'
        ]); 
        $nome_imagem = " ";

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $imagem_extension = $imagem->getClientOriginalExtension();
            $imagem_name = "imagem-" . date('Ymdhis');
            Storage::disk('slide_imagem')->put($imagem_name . '.' . $imagem_extension,  File::get($imagem));
            $nome_imagem = $imagem_name . '.' . $imagem_extension;
        }
        
        Slide::create([
            'titulo' => $request->titulo,
            'link' => $request->link,
            'categoria' => $request->categoria,
            'imagem' => $nome_imagem
            ]);

        return redirect(route('lista'))->with('success', 'Banner Criado com Sucesso');
    }

    public function list()
    {
        $slides = Slide::all();
        return view('admin.index', ['slides' => $slides]);
    }

    public function edit(Slide $slide)
    {         
        return view('admin.edit', ['slide' => $slide]);
    }

    public function update(Request $request, Slide $slide)
    {
        $request->validate([
            'titulo' => 'required',
            'link' => 'required',
            'categoria' => 'required',
        ], [
            'titulo.required' => 'Titulo é um campo obrigatorio',
            'link.required' => 'Link é um campo obrigatorio',
            'categoria.required' => 'Categoria é um campo obrigatorio'
        ]); 

        $nome_imagem =  $slide->imagem;
        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $imagem_extension = $imagem->getClientOriginalExtension();
            $imagem_name = "imagem-" . date('Ymdhis');
            Storage::disk('slide_imagem')->put($imagem_name . '.' . $imagem_extension,  File::get($imagem));
            $nome_imagem = $imagem_name . '.' . $imagem_extension;
        }

        $slide->update([
            'titulo' => $request->titulo,
            'link' => $request->link,
            'categoria' => $request->categoria,
            'imagem' => $nome_imagem
            ]);

        return redirect(route('lista'))->with('success', 'Banner Alterado com Sucesso');
    }

    public function delete (Slide $slide)
    {
        $slide->delete();
        return redirect(route('lista'))->with('success', 'Banner Deletado com Sucesso');

    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorista;


class MotoristaController extends Controller
{
    public function index()
    {
        $motoristas = Motorista::all();
        return view('motoristas.index', compact('motoristas'));
    }

    public function create()
    {
        return view('motoristas.create');
    }

    public function store(Request $request)
{

    $request->validate([
        'nome' => 'required|string|max:100',
        'cnh' => 'required|string|max:20|unique:motoristas,cnh',
        'data_nascimento' => 'required|date',
        'telefone' => 'required|string|max:15',
    ], [
        'nome.required' => 'O campo Nome é obrigatório.',
        'cnh.required' => 'O campo CNH é obrigatório.',
        'cnh.unique' => 'A CNH informada já está cadastrada.',
        'data_nascimento.required' => 'A Data de Nascimento é obrigatória.',
        'telefone' => 'Telefone é obrigatório',
    ]);


    Motorista::create($request->all());


    return redirect()->route('motoristas.index')->with('success', 'Motorista adicionado com sucesso!');
}


    public function show(Motorista $motorista)
    {
        return view('motoristas.show', compact('motorista'));
    }

    public function edit(Motorista $motorista)
    {
        return view('motoristas.edit', compact('motorista'));
    }

    public function update(Request $request, Motorista $motorista)
{

    $request->validate([
        'nome' => 'required|string|max:100',
        'cnh' => 'required|string|max:20|unique:motoristas,cnh,' . $motorista->motorista_id . ',motorista_id',
    ]);

    $motorista->update($request->all());

    return redirect()->route('motoristas.index')->with('success', 'Motorista atualizado com sucesso!');
}



public function destroy($motoristaId)
{
    $motorista = Motorista::findOrFail($motoristaId);
    $motorista->delete();

    
    return redirect()->route('motoristas.index')->with('success', 'Motorista excluído com sucesso!');
}
}


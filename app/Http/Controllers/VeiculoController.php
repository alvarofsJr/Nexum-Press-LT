<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;

class VeiculoController extends Controller
{

    public function index()
    {

        $veiculos = Veiculo::all();


        return view('veiculos.index', compact('veiculos'));
    }

    public function create()
    {
        return view('veiculos.create');
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'ano_fabricacao' => 'required|integer|min:1900|max:' . date('Y'),
            'placa' => 'required|string|max:7|unique:veiculos,placa',
        ]);


        Veiculo::create($validated);

        return redirect()->route('veiculos.index')->with('success', 'Veículo adicionado com sucesso!');
    }



    public function show(Veiculo $veiculo)
    {
        return view('veiculos.show', compact('veiculo'));
    }

    public function edit(Veiculo $veiculo)
    {
        return view('veiculos.edit', compact('veiculo'));
    }

    public function update(Request $request, $id)
    {
        $veiculo = Veiculo::findOrFail($id);


        $request->validate([
            'placa' => 'required|max:7',
            'modelo' => 'required',
            'marca' => 'required',
            'ano_fabricacao' => 'required|integer|min:1900|max:' . date('Y'),
        ]);


        $veiculo->update($request->all());


        return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
    }



    public function destroy($id)
    {
        $veiculo = Veiculo::findOrFail($id);


        $veiculo->delete();

        return redirect()->route('veiculos.index')->with('success', 'Veículo excluído com sucesso!');
    }

}


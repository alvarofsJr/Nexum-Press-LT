<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carga;
use App\Models\Veiculo;
use App\Models\Motorista;

class CargaController extends Controller
{
    public function index()
    {
        $cargas = Carga::with(['motorista', 'veiculo'])->get();
        return view('cargas.index', compact('cargas'));
    }

    public function create()
    {
        $motoristas = Motorista::all();
        $veiculos = Veiculo::all();
        return view('cargas.create', compact('motoristas', 'veiculos'));
    }

    public function store(Request $request)
{
    $request->validate([
        'descricao' => 'required|string|max:255',
        'peso' => 'required|numeric',
        'data_embarque' => 'required|date',
        'motorista_id' => 'required|exists:motoristas,motorista_id',
        'veiculo_id' => 'required|exists:veiculos,veiculo_id',
    ], [
        'descricao.required' => 'Faça a descrição da carga',
        'peso.required' => 'Informe o peso da carga (Kg)',
        'peso.numeric' => 'O peso deve ser um número válido',
        'data_embarque.required' => 'Informe a data de embarque',
        'data_embarque.date' => 'A data de embarque deve ser uma data válida',
        'motorista_id.required' => 'Você deve adicionar um motorista',
        'motorista_id.exists' => 'O motorista selecionado não existe',
        'veiculo_id.required' => 'Você deve adicionar um veículo',
        'veiculo_id.exists' => 'O veículo selecionado não existe',
    ]);


    Carga::create($request->all());


    return redirect()->route('cargas.index')->with('success', 'Carga criada com sucesso!');
}

    public function show(Carga $carga)
    {
        return view('cargas.show', compact('carga'));
    }

    public function edit(Carga $carga)
    {
        $motoristas = Motorista::all();
        $veiculos = Veiculo::all();
        return view('cargas.edit', compact('carga', 'motoristas', 'veiculos'));
    }

    public function update(Request $request, Carga $carga)
    {
        $request->validate([
            'descricao' => 'nullable|string|max:255',
            'peso' => 'nullable|numeric',
            'data_embarque' => 'nullable|date',
            'motorista_id' => 'required|exists:motoristas,motorista_id',
            'veiculo_id' => 'required|exists:veiculos,veiculo_id',
        ], [
            'motorista_id.required' => __('messages.validation.motorista_required'),
            'veiculo_id.required' => __('messages.validation.veiculo_required'),
            'data_embarque.required' => __('messages.validation.data_embarque_required'),
            'peso.required' => __('messages.validation.peso_required'),
            'descricao.required' => __('messages.validation.descricao_required'),
        ]);


        $carga->update($request->all());

    
        return redirect()->route('cargas.index')->with('success', __('messages.success.update'));
    }

    public function destroy(Carga $carga)
{

    $carga->delete();


    return redirect()->route('cargas.index')->with('success', __('messages.success.delete'));
}
}

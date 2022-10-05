<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function create()
    {
        return view('car.create');
    }

    public function index()
    {
        $cars = Car::whereUserId(auth()->id())
            ->get();

        return view('car.index')
            ->with('cars', $cars);
    }

    public function save(Request $request)
    {
        $file = $request->file('file');
        $filename = crc32(now()) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('cars'), $filename);

        Car::create([
            "user_id" => auth()->id(),
            "modalidade" => $request->modalidade,
            "modelo" => $request->modelo,
            "placa" => $request->placa,
            "renavam" => $request->renavam,
            "ano" => $request->ano,
            "cambio" => $request->cambio,
            "preco" => $request->preco,
            "combustivel" => $request->combustivel,
            "condicao" => $request->condicao,
            "descricao" => $request->descricao,
            "imagem_path" => '/cars/' . $filename,
        ]);

        session()->flash('success', 'Carro adicionado com sucesso!');

        return redirect()->route('dashboard');
    }

    public function delete(Car $car)
    {
        $car->delete();

        session()->flash('success', 'Carro removido com sucesso!');

        return redirect()->back();
    }
}

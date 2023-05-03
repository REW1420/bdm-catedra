<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedido = Pedido::all();
        return $pedido;

        if ($pedido->isEmpty()) {
            return response()->json(['error' => 'No se encontro su pedido.'], 404);
        } else {
            return response()->json([$pedido, 200]);
        } //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pedido = new Pedido();
        $pedido->id_pedido = $request->id_pedido;
        $pedido->fecha = $request->fecha;
        $pedido->total_a_pagar = $request->total_a_pagar;
        $pedido->pagado = $request->pagado;
        $pedido->entregado = $request->entregado;
        $pedido->latitud = $request->latitud;
        $pedido->longitud = $request->longitud;
        $pedido->id_usuario = $request->id_usuario;
        $pedido->save();

        return response()->json([
            "mensaje" => "pedido creado",
            "pedido" => $pedido
        ]); //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pedido)
    {
        $pedido = Pedido::where('id_pedido', $id_pedido)->first();

        if (!$pedido) {
            return response()->json([
                "mensaje" => "Pedido con ID $id_pedido no existe"
            ], 404);
        } else if ($pedido) {
            $pedido = new Pedido();
            $pedido->id_pedido = $request->id_pedido;
            $pedido->fecha = $request->fecha;
            $pedido->total_a_pagar = $request->total_a_pagar;
            $pedido->pagado = $request->pagado;
            $pedido->entregado = $request->entregado;
            $pedido->latitud = $request->latitud;
            $pedido->longitud = $request->longitud;
            $pedido->id_usuario = $request->id_usuario;
            $pedido->save();


            return response()->json([
                "mensaje" => "Pedido actualizado",
                "pedido" => $pedido
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pedido)
    {
        $pedido = Pedido::where('id_pedido', $id_pedido)->first();

        if (!$pedido) {
            return response()->json([
                "mensaje" => "El pedido con ID $id_pedido no existe"
            ], 404);
        }

        $pedido = Pedido::where('id_pedido', $id_pedido)->delete();

        return response()->json([
            "mensaje" => "Pedido con ID $id_pedido ha sido eliminado"
        ], 200); //
    }
}
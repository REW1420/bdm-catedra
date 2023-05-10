<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



        $cliente = Cliente::all();


        if ($cliente->isEmpty()) {
            return response()->json(['error' => 'No se encontraron clientes.'], 404);
        } else {
            return response()->json([$cliente, 200]);

        }
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
        $cliente = new Cliente();
        $cliente->id_cliente = $request->id_cliente;
        $cliente->nombre = $request->nombre;
        $cliente->correo = $request->correo;
        $cliente->contrasena = $request->contrasena;
        $cliente->numero_de_telefono = $request->numero_de_telefono;
        $cliente->save();

        return response()->json([
            "mensaje" => "cliente creado",
            "cliente" => $cliente
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_cliente)
    {
        $cliente = Cliente::where('id_cliente', $id_cliente)->first();

        if (!$cliente) {
            return response()->json([
                "mensaje" => "El cliente con ID $id_cliente no existe"
            ], 404);
        } else if ($cliente) {
            $cliente = new Cliente();
            $cliente->id_cliente = $request->id_cliente;
            $cliente->nombre = $request->nombre;
            $cliente->correo = $request->correo;
            $cliente->contrasena = $request->contrasena;
            $cliente->numero_de_telefono = $request->numero_de_telefono;
            $cliente->save();

            return response()->json([
                "mensaje" => "cliente actualizado",
                "cliente" => $cliente
            ]);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_cliente)
    {
        $cliente = Cliente::where('id_cliente', $id_cliente)->first();

        if (!$cliente) {
            return response()->json([
                "mensaje" => "El cliente con ID $id_cliente no existe"
            ], 404);
        }

        $cliente = Cliente::where('id_cliente', $id_cliente)->delete();

        return response()->json([
            "mensaje" => "El cliente con ID $id_cliente ha sido eliminado"
        ], 200);
    }




}
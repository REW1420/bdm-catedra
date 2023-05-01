<?php

namespace App\Http\Controllers;

use App\Models\Articulos_comprados;
use Illuminate\Http\Request;

class ArticulosCompradosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producto = Articulos_comprados::all();

        if ($producto->isEmpty()) {
            return response()->json(['error' => 'No se encontraron articulos comprados.'], 404);
        } else {
            return response()->json([$producto, 200]);
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

        $validacion = $request->validate([
            'productos' => 'required|array',
        ]);

        $articulo = new Articulos_comprados();
        $articulo->id_articulo = $request->id_articulo;
        $articulo->productos = $validacion['productos'];
        $articulo->id_pedido = $request->id_pedido;
        $articulo->save();

        return response()->json([
            'message' => 'Articulos guardados',
            'articulos' => $articulo->productos
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Articulos_comprados $articulos_comprados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articulos_comprados $articulos_comprados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_articulo)
    {
        $articulo = Articulos_comprados::where('id_articulo', $id_articulo)->first();
    
        if (!$articulo) {
            return response()->json([
                "mensaje" => "Articulo con ID $id_articulo no existe"
            ], 404);
        }
    
        $articulo->productos = $request->input('productos');
        $articulo->save();
    
        return response()->json([
            "mensaje" => "Articulo actualizado",
            "articulo" => $articulo
        ], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_articulo)
    {
        $cliente = Articulos_comprados::where('id_articulo', $id_articulo)->first();

        if (!$cliente) {
            return response()->json([
                "mensaje" => "Los Articulos con ID $id_articulo no existe"
            ], 404);
        }

        $cliente = Articulos_comprados::where('id_articulo', $id_articulo)->delete();

        return response()->json([
            "mensaje" => "Articulos con ID $id_articulo ha sido eliminado"
        ], 200);

    }
}
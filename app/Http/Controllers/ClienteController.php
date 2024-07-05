<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class ClienteController extends Controller
{
    public function newClient(Request $request){
        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }

    public function getClientes()
    {
        $clientes = Cliente::select('id','folio', 'nombre', 'telefono')->get();
        return response()->json($clientes, 200);
    }

    public function getTodo(){
        $client = Cliente::select('id','folio', 'nombre','tipo_dispositivo','otro_dispositivo','modelo','observaciones','especificaciones','status')->get();
        return response()->json($client, 200);
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');

        Log::info('Updating status for client with ID: ' . $id);

        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }
        $cliente->status = $status;
        $cliente->save();
        Log::info('Status updated successfully.');
        return response()->json($cliente, 200);
    }

    
    public function getPhoneNumberByFolio($folio)
    {
        $cliente = Cliente::where('folio', $folio)->first();

        if ($cliente) {
            return response()->json(['telefono' => $cliente->telefono], 200);
        }

        return response()->json(['message' => 'Cliente no encontrado.'], 404);
    }


}
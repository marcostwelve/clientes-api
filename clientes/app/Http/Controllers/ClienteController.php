<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;


class ClienteController extends Controller
{

    public function index()
    {
        $clientes =  Cliente::all();
        return response()->json($clientes, 200);
    }


    public function store(Request $request)
    {
        try {

            $cliente = Cliente::create($request->all());
            if ($cliente) {
                return response()->json([
                    'message' => 'Cliente criado com sucesso'
                ], 201);
            }

            return response()->json([
                'message' => 'Erro ao criar cliente'
            ], 304);
        }

        catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro no servidor'
            ], 500);
        }
    }


    public function show($cliente)
    {
        try {
            $cliente = Cliente::find($cliente);
            if($cliente) {
                return response($cliente, 200);
            }

            return response()->json([
                'message' => 'Cliente não encontrado'
            ], 404);
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro no servidor'
            ], 500);
        }
    }


    public function update(Request $request, $cliente)
    {

        try {
            $cliente = Cliente::find($cliente);
            if ($cliente) {
                $cliente->update($request->all());
                return response($cliente, 200);
            }

            return response()->json([
                'message' => 'Erro ao atualizar cliente'
            ], 404);
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro no servidor'
            ], 500);
        }
    }


    public function destroy($cliente)
    {
        try {

            $cliente = Cliente::find($cliente);
            if ($cliente) {
                $cliente->delete();
                return response()->json([
                    'message' => 'Cliente excluido com sucesso'
                ], 204);
            }

            return response()->json([
                'message' => 'Erro ao excluir cliente'
            ], 404);
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro no servidor'
            ], 500);
        }
    }

    public function showByRazaoSocial(Request $request, $razaoSocial)
    {
        try {

            $razaoSocialTratada = str_replace('-', ' ', $razaoSocial);
            $cliente = Cliente::where('razaoSocial', 'LIKE', "%$razaoSocialTratada%")->get();

            if($cliente->isEmpty()) {
                return response()->json([
                    'message' => 'Erro ao buscar razão social'
                ], 404);
            }

            return response()->json($cliente, 200);



        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Erro no servidor'
            ], 500);
        }
    }
}

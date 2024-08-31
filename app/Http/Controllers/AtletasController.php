<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\Atletas;

class AtletasController extends Controller
{
    public function index(){
        $regAtleta = Atletas::All();
        $contador = $regAtleta->count();

        return 'Atletas: '.$contador.$regAtleta.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    public function show(string $id){ 
        $regAtleta = Atletas::find($id);

        if($regAtleta){
            return 'Atletas encontrados: '.$regAtleta.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'Nenhum atleta encontrado. '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    public function store(Request $request){
        $regAtleta = $request->All();

        $regVerifq = Validator::make($regAtleta,[
            'nomeAtleta'=>'required',
            'nacionalidadeAtleta'=>'required',
            'idadeAtleta'=>'required'
        ]);

        if($regVerifq->fails()){
            return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        $regAtletaCad = Atletas::create($regAtleta);

        if( $regAtletaCad){
            return 'Atletas registrados:'.Response()->json([],Response::HTTP_NO_CONTENT);

        }else{
            return 'Atletas não registrados.'.Response()->json([],Response::HTTP_NO_CONTENT);

        }

    }

    //Crud -> update(alterar)
    public function update(Request $request,string $id){

        $regAtleta = $request->All();

        $regVerifq = Validator::make($regAtleta,[
            'nomeAtleta'=>'required',
            'nacionalidadeAtleta'=>'required',
            'idadeAtleta'=>'required'
        ]);

        if($regVerifq->fails()){
            return 'Registros não atualizados: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        $regAtletaBanco = Atletas::Find($id);
        $regAtletaBanco->nomeAtleta = $regAtleta['nomeAtleta'];
        $regAtletaBanco->nacionalidadeAtleta = $regAtleta['nacionalidadeAtleta'];
        $regAtletaBanco->idadeAtleta = $regAtleta['idadeAtleta'];

        $retorno = $regAtletaBanco->save();

        if($retorno){
            return "Dados do atleta atualizado com sucesso.".Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return "Atenção... Erro: Atleta não atualizado.".Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //Crud -> delete(apagar)
    public function destroy(string $id){

        $regAtleta = Atletas::Find($id);
    
        if($regAtleta->delete()){   
        return "Os dados do atleta foram deletados com sucesso".response()->json([],Response::HTTP_NO_CONTENT);
        }
    
        return "Algo deu errado: Dados não deletados".response()->json([],Response::HTTP_NO_CONTENT);
        }
}

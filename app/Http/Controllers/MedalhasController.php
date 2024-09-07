<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

use App\Models\Medalhas;

class MedalhasController extends Controller
{
    //Crud -> Read(leitura) Select/Visualizar
    //Mostrar todos os registros da tabela livros
    public function index(){
        $regMedalha = Medalhas::All();
        $contador = $regMedalha->count();

        return 'Medalhas: '.$contador.$regMedalha.Response()->json([],Response::HTTP_NO_CONTENT);
    }

    //Crud -> Read(leitura) Select/Visualizar
    //Mostrar um tipo de registro especifico
    public function show(string $id){ 
        $regMedalha = Medalhas::find($id);

        if($regMedalha){
            return 'Medalhas encontrados: '.$regMedalha.Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return 'Nenhuma medalha encontrado. '.Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //Cadastrar registros
    //Crud -> Create(criar/cadastrar)
    public function store(Request $request){
        $regMedalha = $request->All();

        $regVerifq = Validator::make($regMedalha,[
            'tipoMedalha'=>'required',
            'modalidade'=>'required',
            'idAtleta'=>'required'
        ]);

        if($regVerifq->fails()){
            return 'Registros Invalidos: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        $regMedalhaCad = Medalhas::create($regMedalha);

        if( $regMedalhaCad){
            return 'Medalhas registrados:'.Response()->json([],Response::HTTP_NO_CONTENT);

        }else{
            return 'Medalhas não registrados.'.Response()->json([],Response::HTTP_NO_CONTENT);

        }

    }

    //Crud -> update(alterar)
    public function update(Request $request,string $id){

        $regMedalha = $request->All();

        $regVerifq = Validator::make($regMedalha,[
            'tipoMedalha'=>'required',
            'modalidade'=>'required',
            'idAtleta'=>'required'
        ]);

        if($regVerifq->fails()){
            return 'Registros não atualizados: '.Response()->json([],Response::HTTP_NO_CONTENT);

        }
        $regMedalhaBanco = Medalhas::Find($id);
        $regMedalhaBanco->tipoMedalha = $regMedalha['tipoMedalha'];
        $regMedalhaBanco->modalidade = $regMedalha['modalidade'];
        $regMedalhaBanco->idAtleta = $regMedalha['idAtleta'];

        $retorno = $regMedalhaBanco->save();

        if($retorno){
            return "Dados da medalha atualizados com sucesso.".Response()->json([],Response::HTTP_NO_CONTENT);
        }else{
            return "Atenção... Erro: Dados não atualizados.".Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    //Crud -> delete(apagar)
    public function destroy(string $id){

        $regMedalha = Medalhas::Find($id);
    
        if($regMedalha->delete()){   
        return "Os dados relacionados a medalhas foram deletados com sucesso".response()->json([],Response::HTTP_NO_CONTENT);
        }
    
        return "Algo deu errado: Dados não deletados".response()->json([],Response::HTTP_NO_CONTENT);
        }
}
<?php

namespace App\Http\Controllers;

use App\Models\AlimentosModel;
use App\Models\AnimaisModel;
use App\Models\ConsumoAlimentoModel;
use App\Models\FuncionariosModel;
use App\Models\JaulaModel;
use App\Models\ZooModel;
use Illuminate\Http\Request;
use DateTime;
use DatePeriod;
use DateInterval;

class ZooController extends Controller
{
    //ZOOLOGICO
    public function store_zoologico(Request $request)
    {
        $zoo = new ZooModel();
        $zoo->nome = $request->nome;
        $zoo->endereco = $request->endereco;
        $zoo->save();
    }
    public function show_zoologico()
    {
        $zoo = new ZooModel();
        $zoo = $zoo->all();
        return $zoo;
    }

    //ANIMAL
    public function store_animal(Request $request)
    {
        $animal = new AnimaisModel();
        $animal->nome = $request->nome;
        $animal->idade = $request->idade;
        $animal->peso = $request->peso;
        $animal->sexo = $request->sexo;
        $animal->especie = $request->especie;
        $animal->paisOrigem = $request->pais_origem;
        $animal->estadoOrigem = $request->estado_origem;
        $animal->save();
    }
    public function show_animal()
    {
        $animal = new AnimaisModel();
        $animal = $animal->all();
        return $animal;
    }

    public function store_alimentos(Request $request)
    {
        $alimentos = new AlimentosModel();
        $alimentos->nome = $request->nome_alimento;
        $alimentos->save();
        var_dump($alimentos);
    }

    public function store_funcionario(Request $request)
    {
        $funcionario = new FuncionariosModel();
        $zoo = new ZooModel();
        $verificacao = $zoo->find($request->id_zoologico)->id;
        if($verificacao != null)
        {
            $funcionario->cpf = $request->cpf;
            $funcionario->nome = $request->nome;
            $funcionario->email = $request->email;
            $funcionario->fk_zoologico_id = $request-> id_zoologico;
            $funcionario->save();
            return $funcionario;
        }else{
            return "Esse zoologico não foi encontrado";
        }
    }
}
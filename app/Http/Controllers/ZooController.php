<?php

namespace App\Http\Controllers;

use App\Models\AlimentosModel;
use App\Models\AnimaisModel;
use App\Models\ConsumoAlimentoModel;
use App\Models\FuncionariosModel;
use App\Models\JaulaModel;
use App\Models\ZooModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Funcoes;
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
        $zoo = new ZooModel();
        $animal = new AnimaisModel();
        $id_zoologico = Funcoes::busca_zoologico($request->nome_zoologico);
        if($id_zoologico != null){
            $animal->nome = $request->nome;
            $animal->idade = $request->idade;
            $animal->peso = $request->peso;
            $animal->sexo = $request->sexo;
            $animal->especie = $request->especie;
            $animal->paisOrigem = $request->pais_origem;
            $animal->estadoOrigem = $request->estado_origem;
            $animal->fk_zoologico_id = $id_zoologico;
            $animal->save();
            return "Animal cadastrado com sucesso!";
        }else{
            return "Falha no cadastro do Animal";
        }
    }
    public function show_animal()
    {
        $animal = new AnimaisModel();
        $animal = $animal->all();
        return $animal;
    }
    public function show_animal_zoologico(Request $request)
    {
        $zoo = new ZooModel();
        $id_zoologico = Funcoes::busca_zoologico($request->nome_zoologico);
        return Funcoes::busca_animal_zoologico_id($id_zoologico);
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
        $id_zoologico = Funcoes::busca_zoologico($request->nome_zoologico);
        if($id_zoologico != null)
        {
            $funcionario->cpf = $request->cpf;
            $funcionario->nome = $request->nome;
            $funcionario->email = $request->email;
            $funcionario->fk_zoologico_id = $id_zoologico;
            $funcionario->save();
            return "Funcionario cadastrado com sucesso!";
        }else{
            return "Não foi possivel realizar o cadastro";
        }
    }
    public function show_funcionario()
    {
        $funcionario = new FuncionariosModel();
        $funcionario = $funcionario->all();
        return $funcionario;
    }
    public function show_funcionario_zoologico(Request $request)
    {
        $zoo = new ZooModel();
        $id_zoologico = Funcoes::busca_zoologico($request->nome_zoologico);
        return Funcoes::busca_funcionarios_zoologico_id($id_zoologico);
    }

    public function store_jaula(Request $request)
    {
        $jaula = new JaulaModel();
        $zoo = new ZooModel();
        $id_zoologico = Funcoes::busca_zoologico($request->nome_zoologico);
        $id_animal = Funcoes::busca_animal($request->nome_animal,$request->especie,$request->idade);
        if($id_zoologico != null and $id_animal != null)
        {
            $jaula->numeroJaula = $request->numero_jaula;
            $jaula->fk_animais_idAnimal = $id_animal;
            $jaula->fk_zoologico_id = $id_zoologico;
            $jaula->save();
            return "Jaula criada com sucesso!";
        }else{
            return "Não foi possivel realizar o cadastro!";
        }
    }
    public function show_jaula()
    {
        $jaula = new JaulaModel();
        $jaula = $jaula->all();
        return $jaula;
    }
}
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
    }
    public function show_alimentos()
    {
        $alimentos = new AlimentosModel();
        $alimentos = $alimentos->all();
        return $alimentos;
    }
    public function show_alimentos_animal(Request $request)
    {
        $zoo = new ZooModel();
        $id_animal = Funcoes::busca_animal($request->nome_animal, $request->especie, $request->idade);
        $id_alimento = Funcoes::busca_alimento_id($request->nome_alimento);
        $consumo = new ConsumoAlimentoModel();
        $consumo->fk_animais_idAnimal=$id_animal;
        $consumo->fk_alimento_idAlimento=$id_alimento;
        $consumo->save();
    }
    public function show_animais_consumo_alimento(Request $request)
    {
        //listar todos os animais que consomenm um determinado alimento
        $animais_id = Funcoes::busca_animal_consumo_alimento($request->nome_alimento);
        $json_animais = Funcoes::busca_array_id_animais($animais_id);
        return $json_animais;
    }

    public function show_alimento_consumidos_animais(Request $request)
    {
        //listar todos os alimentos consumidos por um único animal
        $id_animal = Funcoes::busca_animal($request->nome_animal, $request->especie, $request->idade);
        $lista_alimentos = Funcoes::busca_consumo_alimentos_animal_id($id_animal);
        $json_alimetos = Funcoes::busca_array_id_alimentos($lista_alimentos);
        return $json_alimetos;
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
    public function show_jaula_zoologico(Request $request)
    {
        $zoo = new ZooModel();
        $id_zoologico = Funcoes::busca_zoologico($request->nome_zoologico);
        return Funcoes::busca_jaula_zoologico_id($id_zoologico);
    }
}
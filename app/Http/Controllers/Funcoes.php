<?php

namespace App\Http\Controllers;

use App\Models\AlimentosModel;
use App\Models\AnimaisModel;
use App\Models\ConsumoAlimentoModel;
use App\Models\FuncionariosModel;
use App\Models\JaulaModel;
use App\Models\ZooModel;
use Illuminate\Http\Request;

class Funcoes extends Controller
{
    public static function busca_zoologico($nome_zoologico)
    {
        $zoo = new ZooModel();
        $zoo = $zoo->all();
        $json_zoo = json_decode($zoo);
        //var_dump($json_zoo);
        for($i = 0; $i < count($json_zoo);$i++)
        {
            if($nome_zoologico == $json_zoo[$i]->nome)
            {
                return $json_zoo[$i]->id;
            }
        }
        
        echo "zoologico não encontrado <br>";
        return null;
    }

    public static function busca_animal($nome_animal, $especie, $idade)
    {
        $animal = new AnimaisModel();
        $animal = $animal->all();
        $json_animal = json_decode($animal);
        //var_dump($json_zoo);
        for($i = 0; $i < count($json_animal);$i++)
        {
            if($nome_animal == $json_animal[$i]->nome and $especie == $json_animal[$i]->especie and
            $idade == $json_animal[$i]->idade)
            {
                return $json_animal[$i]->idAnimal;
            }
        }
        
        echo "Animal não encontrado <br>";
        return null;
    }

    public static function busca_animal_zoologico_id($id)
    {
        $animal = new AnimaisModel();
        $animal = $animal->all();
        $json_animal = json_decode($animal);
        //var_dump($json_zoo);
        $array = [];
        for($i = 0; $i < count($json_animal);$i++)
        {
            if($id == $json_animal[$i]->fk_zoologico_id)
            {
                array_push($array, array(
                    "nome" => $json_animal[$i]->nome,
                    "peso" => $json_animal[$i]->peso,
                    "idade" => $json_animal[$i]->idade,
                    "sexo" => $json_animal[$i]->sexo,
                    "paisOrigem" => $json_animal[$i]->paisOrigem,
                    "estadoOrigem" => $json_animal[$i]->estadoOrigem,
                    "especie" => $json_animal[$i]->especie
                ));
            }
        }
        return json_encode($array);
    }

    public static function busca_funcionarios_zoologico_id($id)
    {
        $funcionario = new FuncionariosModel();
        $funcionario = $funcionario->all();
        $json_funcionario = json_decode($funcionario);
        //var_dump($json_zoo);
        $array = [];
        for($i = 0; $i < count($json_funcionario);$i++)
        {
            if($id == $json_funcionario[$i]->fk_zoologico_id)
            {
                array_push($array, array(
                    "nome" => $json_funcionario[$i]->nome,
                    "email" => $json_funcionario[$i]->email,
                    "cpf" => $json_funcionario[$i]->cpf
                ));
            }
        }
        return json_encode($array);
    }
}

?>
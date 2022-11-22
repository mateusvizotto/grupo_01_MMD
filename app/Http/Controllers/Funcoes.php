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

    public static function busca_jaula_zoologico_id($id)
    {
        $jaula = new JaulaModel();
        $jaula = $jaula->all();
        $json_jaula = json_decode($jaula);
        //var_dump($json_zoo);
        $array = [];
        for($i = 0; $i < count($json_jaula);$i++)
        {
            if($id == $json_jaula[$i]->fk_zoologico_id)
            {
                array_push($array, array(
                    "numero_jaula" => $json_jaula[$i]->numeroJaula,
                ));
            }
        }
        return json_encode($array);
    }

    public static function busca_alimento_id($nome)
    {
        $alimento = new AlimentosModel();
        $alimento = $alimento->all();
        $json_alimento = json_decode($alimento);
        //var_dump($json_zoo);
        $array = [];
        for($i = 0; $i < count($json_alimento);$i++)
        {
            if($nome == $json_alimento[$i]->nome)
            {
                return $json_alimento[$i]->idAlimento;
            }
        }
    }

    public static function busca_animal_consumo_alimento_id($id)
    {
        $consumo = new ConsumoAlimentoModel();
        $consumo = $consumo->all();
        $json_consumo = json_decode($consumo);
        //var_dump($json_zoo);
        $array = [];
        for($i = 0; $i < count($json_consumo);$i++)
        {
            if($id == $json_consumo[$i]->fk_alimento_idAlimento)
            {
                array_push($array, array(
                    "id_animal" => $json_animal[$i]->fk_animais_idAnimal
                ));
            }
        }
        return json_encode($array);
    }

    public static function busca_animal_consumo_alimento($nome)
    {
        $id_alimento = Funcoes::busca_alimento_id($nome);
        $animal = new AnimaisModel();
        $animal = $animal->all();
        $consumo = new ConsumoAlimentoModel();
        $consumo = $consumo->all();
        $json_consumo = json_decode($consumo);
        $lista_id = [];
        for($i = 0; $i < count($json_consumo);$i++)
        {
            if($id_alimento == $json_consumo[$i]->fk_alimento_idAlimento)
            {
                var_dump($json_consumo[$i]->fk_alimento_idAlimento);
                // array_push($lista_id, array(
                //     $json_consumo[$i]->$fk_animais_idAnimal
                // ));
            }
        }

        $json_animal = json_decode($animal);
        $lista_animal = [];
        $array_completed;
        for($i = 0; $i < count($lista_id);$i++)
        {
            if($lista_id[$i] == $json_animal[$i]->idAnimal)
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
                $array_completed = json_encode($array);
            }
        }
        //return $array_completed;
    }

    public static function busca_animal_id($id)
    {
        $animal = new AnimaisModel();
        $animal = $animal->all();
        $json_animal = json_decode($animal);
        //var_dump($json_zoo);
        $array = [];
        $array_completed;
        for($i = 0; $i < count($json_animal);$i++)
        {
            //var_dump($i);
            if($id == $json_animal[$i]->idAnimal)
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
                $array_completed = json_encode($array);
            }
        }
        return $array_completed;
    }
}

?>
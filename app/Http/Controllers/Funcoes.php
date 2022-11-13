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
}

?>
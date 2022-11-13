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
    public function store_alimentos(Request $request)
    {
        $alimentos = new AlimentosModel();
        $alimentos->nome = $request->nome_alimento;
        $alimentos->save();
        var_dump($alimentos);
    }
// aqui vai o codigo propriamente dito da api 

}
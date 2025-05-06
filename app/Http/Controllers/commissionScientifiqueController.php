<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Candidat;
class commissionScientifiqueController extends Controller
{
    public function showCommission(){
        $pers = session('pers');
        $datas = Candidat::where('id_personnel', $pers->id) ->where('id_instance', 3)->first();
        return view('commissionScientifique',  ['datas' => $datas,'pers' => $pers]);
    }
}

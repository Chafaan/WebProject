<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Candidat;
class conseilUniversiteController extends Controller
{
    public function showConseilU(){
        $pers = session('pers');
        $datas = Candidat::where('id_personnel', $pers->id) ->where('id_instance', 2)->first();
        return view('conseilUniversite',  ['datas' => $datas,'pers' => $pers]);
    }
}

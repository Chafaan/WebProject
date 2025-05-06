<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Candidat;
class chefDepartementController extends Controller
{
    public function showDepartement(){
        $pers = session('pers');
        $datas = Candidat::where('id_personnel', $pers->id) ->where('id_instance', 4)->first();
        return view('chefDepartement',  ['datas' => $datas,'pers' => $pers]);
    }
}

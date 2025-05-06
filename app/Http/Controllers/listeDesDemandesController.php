<?php
namespace App\Http\Controllers;
use App\Models\Personnel;
use App\Models\Candidat;
use Illuminate\Http\Request;
class listeDesDemandesController extends Controller
{
    public function showlisteDesDemandes(){
        $pers = session('pers');
        $datas = Candidat::where('id_personnel', $pers->id)->get();
        return view('listeDesDemandes',  ['datas' => $datas,'pers' => $pers]);
    }

}


<?php
namespace App\Http\Controllers;
use App\Models\Candidat;
use Illuminate\Http\Request;
class conseilEtablissementController extends Controller
{
    public function showConseil()
    {
        $pers = session('pers');
        $datas = Candidat::where('id_personnel', $pers->id) ->where('id_instance', 1)->first();
        return view('conseilEtablissement', ['datas' => $datas, 'pers' => $pers]);
    }
}

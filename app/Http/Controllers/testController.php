<?php
namespace App\Http\Controllers;
use App\Models\Personnel;
use App\Models\Candidat;
use Illuminate\Http\Request;
class testController extends Controller
{
    public function index(){
        $pers = session('pers');
        $datas = Personnel::paginate(10);
    return view('test', ['datas' => $datas, 'pers' => $pers]);
        }
        
}
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class profileController extends Controller
{
    public function index(){
        $pers = session('pers');
        return view('profile',  ['pers' => $pers]);
     }
}

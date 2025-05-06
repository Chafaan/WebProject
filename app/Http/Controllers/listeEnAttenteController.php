<?php
namespace App\Http\Controllers;
use App\Models\Candidat;
use Illuminate\Http\Request;
class listeEnAttenteController extends Controller
{
    public function show()
    {
        $datas = Candidat::paginate(10);
        // dd($datas);
        return view('listeEnAttente', ['datas' => $datas]);
    }
    public function updateEtat($id, Request $request)
{
    $candidat = Candidat::findOrFail($id);
    
    
    if ($request->input('action') === 'valider') {
        $candidat->update(['etat' => 'validé']);
        return redirect()->back()->with('successValidation', true);
    } elseif ($request->input('action') === 'refuser') {
        $candidat->update(['etat' => 'refusé']);
        return redirect()->back()->with('successRefusal', true);
    }
    
    
}
    
}

<?php
namespace App\Http\Controllers;
use App\Models\Personnel;
use App\Models\Candidat;
use Illuminate\Http\Request;
class administrationController extends Controller
{
    public function nombreDemandesEnAttente() {
        $nombreDemandes = Candidat::where('etat', 'En_attente')->count();
        return $nombreDemandes;
    }
    public function showAll(){
    $datas = Personnel::paginate(10);
    $nombreDemandesEnAttente = $this->nombreDemandesEnAttente(); 
    return view('administration', ['datas' => $datas, 'nombreDemandesEnAttente' => $nombreDemandesEnAttente]);
}

    public function deleteData($id) {
        $cand = Candidat::where('id_personnel', $id)->first();
        $pers = Personnel::find($id);
        if (!$pers && !$cand) {
            return redirect()->back()->with('error', 'Données introuvables.');
        }
        $cand->delete();
        $pers->delete();
        return redirect()->back()->with('success', 'Données supprimées avec succès.');
    }
        
    public function edit($id)
    {
        $user = Personnel::find($id);
        return view('test', compact('user'));
    }
    public function update(Request $request, $id)
    {
        
        $user = Personnel::findOrFail($id);
        
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->nomComplet_arb = $request->input('nomComplet_arb');
        $user->ppr = $request->input('ppr');
        $user->sexe = $request->input('sexe');
        $user->datenaisf = $request->input('date_naissance');
        $user->email = $request->input('email'); 
        $user->date_rec_estbm = $request->input('date_recrutement_estbm');
        $user->id_grade = $request->input('grade');
        $user->date_rec_minis = $request->input('date_recrutement_minister');
        $user->id_dep = $request->input('departement');
        $user->id_diplome = $request->input('diplome');
        $user->id_specialite = $request->input('specialite');
        
        $user->save();
        
        return redirect()->back()->with('success', 'User updated successfully');
    }
    
    
    
    
        
    
    
    
    
    
}
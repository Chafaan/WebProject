<?php
namespace App\Http\Controllers;
use App\Models\Personnel;
use App\Models\Candidat;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
class ajoutDePersonnelController extends Controller
{
    public function nombreDemandesEnAttente() {
        $nombreDemandes = Candidat::where('etat', 'En_attente')->count();
        return $nombreDemandes;
    }
    public function show()
    {
        $nombreDemandesEnAttente = $this->nombreDemandesEnAttente(); 
        return view('ajoutDePersonnel', ['nombreDemandesEnAttente' => $nombreDemandesEnAttente]);
}
       
    
public function store(Request $request){
    // Règles de validation
    $validated = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'nomComplet_arb' => 'required',
        'ppr' => 'required',
        'status' => 'required',
        'sexe' => 'required',
        'datenaisf' => 'required|date',
        'email' => 'required|email',
        'date_rec_estbm' => 'required|date',
        'grade' => 'required',
        'date_rec_minis' => 'required|date',
        'dep' => 'required',
        'diplome' => 'required',
        'specialite' => 'required',
        'profession' => 'required', 
    ], [
        'nom.required' => 'Ce champ est obligatoire.',
        'nom.max' => 'Le champ nom ne doit pas dépasser 7 caractères.',
        'prenom.required' => 'Ce champ est obligatoire.',
        'nomComplet_arb.required' => 'Ce champ est obligatoire.',
        'ppr.required' => 'Ce champ est obligatoire.',
        'status.required' => 'Ce champ est obligatoire.',
        'sexe.required' => 'Ce champ est obligatoire.',
        'datenaisf.required' => 'Ce champ est obligatoire.',
        'datenaisf.date' => 'Le champ datenaisf doit être une date valide.',
        'email.required' => 'Ce champ est obligatoire.',
        'email.email' => 'Le champ email doit être une adresse email valide.',
        'date_rec_estbm.required' => 'Ce champ est obligatoire.',
        'date_rec_estbm.date' => 'Le champ date_rec_estbm doit être une date valide.',
        'grade.required' => 'Ce champ est obligatoire.',
        'date_rec_minis.required' => 'Ce champ est obligatoire.',
        'date_rec_minis.date' => 'Le champ date_rec_minis doit être une date valide.',
        'dep.required' => 'Ce champ est obligatoire.',
        'diplome.required' => 'Ce champ est obligatoire.',
        'specialite.required' => 'Ce champ est obligatoire.',
        'profession.required' => 'Ce champ est obligatoire.',
    ]);

    try {
    Personnel::create([
        'nom' => $validated['nom'],
        'prenom' => $validated['prenom'],
        'nomComplet_arb' => $validated['nomComplet_arb'],
        'ppr' => $validated['ppr'],
        'status' => $validated['status'],
        'sexe' => $validated['sexe'],
        'datenaisf' => $validated['datenaisf'],
        'email' => $validated['email'],
        'date_rec_estbm' => $validated['date_rec_estbm'],
        'id_grade' => $validated['grade'],
        'date_rec_minis' => $validated['date_rec_minis'],
        'id_dep' => $validated['dep'],
        'id_diplome' => $validated['diplome'],
        'id_specialite' => $validated['specialite'],
        'profession' => $validated['profession'],
    ]);

    return redirect()->route('store')->with('success', 'Données insérées avec succès!');
  } catch (QueryException $e) {
    if($e->errorInfo[1] == 1062) {
        // Redirect back with a specific error message
        return redirect()->back()->with('error', 'Cette adresse email ou ce PPR existe déjà dans la base de données.');
    }
    // Log the error
    // \Log::error('Erreur lors de l\'insertion des données: '.$e->getMessage());
    
    // Redirect back with a generic error message
    return redirect()->back()->withErrors(['msg' => 'Cette adresse email ou ce PPR existe déjà dans la base de données.']);
}
}
}
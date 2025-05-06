<?php
namespace App\Http\Controllers;
use App\Models\Candidat;
use App\Models\Personnel;
use Illuminate\Http\Request;
use setasign\Fpdi\Tcpdf\Fpdi;
class PdfchefDepartementController extends Controller
{
    public function ajouterInformations(Request $request)
    {
        // Récupérer les données de l'utilisateur
        $nom = $request->nom;
        $prenom = $request->prenom;
        $ppr = $request->n_som;
        $id_pers = $request->id_pers;
        $id_ins = $request->id_ins;
        $etat = $request->etat;
        
        $candidat_db = Candidat::where('id_personnel', $id_pers)->where('id_instance', $id_ins)->first();
        if(!$candidat_db || $candidat_db && $candidat_db->id_instance != $id_ins){  
            //Insertion dans la table Candidat
            $cand = new Candidat();
            $cand->id_personnel = $id_pers;
            $cand->id_instance = $id_ins;
            $cand->etat = $etat;
            $cand->save();
        }
        
        // Récupérer les informations de l'utilisateur depuis la base de données
        $data = Personnel::where('ppr', $ppr)->first();
        $nomComplet_arb = $data->nomComplet_arb;
        // Déterminer le chemin du fichier PDF en fonction du grade de l'utilisateur
        $cheminFichier = '';
        $nomFichier = "$nom $prenom.pdf";
        $cheminFichier = storage_path('app/public/pdf/Chef_Departement.pdf');
        
        // Créer un nouveau fichier PDF en ajoutant les informations de l'utilisateur
        $pdf = new Fpdi();
        $pdf->setSourceFile($cheminFichier);
        $tplIdx = $pdf->importPage(1);
        $pdf->addPage();
        $pdf->useTemplate($tplIdx);
        $pdf->SetFont('freeserif', '', 12);
        $pdf->SetXY(80, 88); 
        $pdf->Cell(100, 10, "$nomComplet_arb", 0, 1, 'L');
        $cheminNouveauFichier = storage_path('app/public/pdf/') . $nomFichier;
        $pdf->Output($cheminNouveauFichier, 'F');
        // Télécharger le nouveau fichier PDF
        return response()->download($cheminNouveauFichier, $nomFichier, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}

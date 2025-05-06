<?php
namespace App\Http\Controllers;
use App\Models\Candidat;
use App\Models\Personnel;
use Illuminate\Http\Request;
use setasign\Fpdi\Tcpdf\Fpdi;
class PdfConseilEtablissementController extends Controller
{
    public function ajouterInformations(Request $request)
    {
        
        
        $nom = $request->nom;
        $prenom = $request->prenom;
        $ppr = $request->n_som;
        $id_pers = $request->id_pers;
        $id_ins = $request->id_ins;
        $etat = $request->etat;
        
        $candidat_db = Candidat::where('id_personnel', $id_pers)->where('id_instance', $id_ins)->first();
        if(!$candidat_db || $candidat_db && $candidat_db->id_instance != $id_ins){  
            
            $cand = new Candidat();
            $cand->id_personnel = $id_pers;
            $cand->id_instance = $id_ins;
            $cand->etat = $etat;
            $cand->save();
        }
        
        
        $data = Personnel::where('ppr', $ppr)->first();
        $nomComplet_arb = $data->nomComplet_arb;

        $cheminFichier = '';
        $nomFichier = "$nom $prenom.pdf";
        
            switch ($data->grade->libelle) {
                case 'PA':
                    $cheminFichier = storage_path('app/public/pdf/etab_PA.pdf');
                    break;
                case 'PH':
                    $cheminFichier = storage_path('app/public/pdf/etab_PH.pdf');
                    break;
                case 'PES':
                    $cheminFichier = storage_path('app/public/pdf/etab_PES.pdf');
                    break;
                case 'admin':
                    $cheminFichier = public_path('storage/pdf/etab_ADMIN.pdf');
                    break;
            }
        
        $pdf = new Fpdi();
        $pdf->setSourceFile($cheminFichier);
        $tplIdx = $pdf->importPage(1);
        $pdf->addPage();
        $pdf->useTemplate($tplIdx);
        $pdf->SetFont('freeserif', '', 12);
        $pdf->SetXY(89, 97); 
        $pdf->Cell(100, 10, "$nomComplet_arb", 0, 1, 'L');
        $cheminNouveauFichier = storage_path('app/public/pdf/') . $nomFichier;
        $pdf->Output($cheminNouveauFichier, 'F');
        
        return response()->download($cheminNouveauFichier, $nomFichier, [
            'Content-Type' => 'application/pdf',
        ]);
    }
}

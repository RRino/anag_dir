<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anagrafica;
use PDF;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PdfBollettinoController extends Controller
{
 
    public function PdfBollettini(Request $req)
    {


        $pdf = new TCPDF;

        $data = Anagrafica::all();
        $nbol2 = $data->count();
    
        $nbol = 1;
        $anno = date('Y');
        $inizio = '01-01-'.$anno;
        $costo =20;
      
        $causale = "ISCRIZIONE ASSOCIAZIONE PROGETTO 10 RIGHE 2023 piu 2 riviste";
        if(strlen($causale) < 3 ){
            echo "Verifica  la causale nella tabella (#__gestionea_parametri)";
            exit;
        }


            // set document information
 
    $pdf::SetAuthor('10 Righe');
    $pdf::SetTitle('Bollettino');
    $pdf::SetSubject('Rinnovi');
    $pdf::SetKeywords('APS');


     // set header and footer fonts
     $pdf::setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
     $pdf::setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
     // set default monospaced font
     $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
     // set margins
     //$pdf->SetMargins(PDF_MARGIN_LEFT, 0, PDF_MARGIN_RIGHT);
     $pdf::SetMargins(0.0, 1.1 , 0.0,0.0);
     // set auto page breaks
     $pdf::SetAutoPageBreak(true, 1);
    // $pdf->SetAutoPageBreak(true ,20);
     // set image scale factor
     $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);
 
     // ---------------------------------------------------------
 
     // set font
     $pdf::SetFont('times', '', 10);
     // add a page
     $pdf::AddPage('L', 'A4');
     //$pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
     // set cell padding
     $pdf::setCellPaddings(1, 0, 0, 0);
     // set cell margins
     $pdf::setCellMargins(0, 0, 0, 0);
     // set color for background
     $pdf::SetFillColor(255, 255, 255);


        
        //$image_file = 'images/logo.png';
        //$html_logo = '<br><br><br><div ><img src="'.$image_file.'" width="25"></div>';
        //$html = $html.$html_logo;

        // Print text using writeHTMLCell()
     //$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
       /// $pdf::writeHTML($html, true, false, true, false, '');

      
       $pdf::SetFillColor(240,50,20);
       $nbol2--;
       $inc = 0;
       $costo = 20;
foreach ($data as $users) {

    $id = $users->id;
    $user = DB::table('anagraficas')->where('id', $id)->select('id', 'nome', 'cognome')->get();
    $nome = $users->nome;
    $cognome = $users->cognome;
    $indirizzo = $users->indirizzo.' '.$users->civico;
    $cap = $users->cap;
    $comune = $users->comune;
    $privincia = $users->sigla_provincia;
    $html = '';
   
    $htmlsegnotaglio  = '<div>--</div>';
    $htmlprimarigas = '<div style="border-bottom: solid 1px #000;">CONTI CORRENTI POSTALI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ricevuta di versamento   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                      Banco<b>Posta</b></div>';
    $htmlprimarigad = '<div style="border-bottom: solid 1px #000;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CONTI CORRENTI POSTALI &nbsp;&nbsp;&nbsp;&nbsp; Ricevuta di versamento  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Banco<b>Posta</b></div>';
    $riga_vert ='<div style="border-left: solid 2px #000;height:500px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp  </div>';

    $htmleuro = '<div style="font-size:24px;background-color:#000;color:#fff;text-align:center;">€</div>';
    $html4 = '<div style="font-size:12px;">sul C/C n.</div>';
    $htmlcc = '<div style="font-size:16px;font-weight:800;">36349785 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    </div>';
    $htmldie = '<div style="font-size:12px;font-weight:800;">di Euro </div>';
    $htmlcosto = '<div style="font-size:16px;font-weight:800;text-align:right;">'.$costo.' </div>';
    $htmlvi = '<div style="font-size:16px;font-weight:800;text-align:right;">,</div>';
    $htmlze = '<div style="font-size:16px;font-weight:800;text-align:left;">00 </div>';

    $htmlsigla = '<div style="font-size:16px;font-weight:900;text-align:left;">TD &nbsp;&nbsp;&nbsp; 123 </div>';
    $htmlimp = '<div style="font-size:10px;font-weight:900;text-align:left;">IMPORTO IN LETTERE</div>';
    $htmlel = '<div style="font-size:14px;font-weight:900;text-align:left;border-bottom: solid 1px #000;">VENTI/00</div>';

    $htmlintest = '<div style="font-size:10px;font-weight:900;text-align:left;">INTESTATO A</div>';
    $htmlgru = '<div style="font-size:12px;font-weight:900;text-align:left;">&nbsp;&nbsp;ASSOCIAZIONE GRUPPO DI STUDI PROGETTO 10 RIGHE APS</div>';
    $htmlgru2 = '<div style="font-size:12px;font-weight:900;text-align:left;">&nbsp;&nbsp;</div>';
    $htmlcaus = '<div style="font-size:12px;font-weight:900;text-align:left;">CAUSALE</div>';
    $htmlquo = '<div style="font-size:12px;font-weight:900;text-align:left;">'.$causale.'</div>';
    $htmlquo2 = '<div style="font-size:10px;font-weight:900;text-align:left;">  &nbsp;&nbsp;</div>';
    $htmleseg = '<div style="font-size:10px;font-weight:900;text-align:left;">ESEGUITO DA</div>';

    $htmlnome = '<div style="font-size:14px;font-weight:900;text-align:left;">  &nbsp;&nbsp;'.$nome.'</div>';
    $htmlvuota = '<div style="font-size:14px;font-weight:900;text-align:left;">  &nbsp;&nbsp;'.$cognome.'</div>';

    $htmlvia = '<div style="font-size:14px;font-weight:900;text-align:left;">  Via-Piazza &nbsp;&nbsp;'.$indirizzo.'</div>';
    $htmlcap = '<div style="font-size:12px;font-weight:900;text-align:left;">  CAP &nbsp;&nbsp;'.$cap.'</div>';
    $htmlloca = '<div style="font-size:12px;font-weight:900;text-align:left;">  LOCALITA\'&nbsp;&nbsp;'.$comune.'</div>';

    $htmlviandes = '<div style="font-size:10px;font-weight:900;text-align:left;">  &nbsp;&nbsp;VIA - PIAZZA</div>';
    $htmlcapndes = '<div style="font-size:10px;font-weight:900;text-align:left;">  &nbsp;&nbsp;CAP</div>';
    $htmllocandes = '<div style="font-size:10px;font-weight:900;text-align:left;">  &nbsp;&nbsp;LOCALITA\'</div>';
    $htmlviandesval ='<div style="font-size:14px;font-weight:900;text-align:left;">  &nbsp;&nbsp;'.$indirizzo.'</div>';
    $htmlcapndesval ='<div style="font-size:14px;font-weight:900;text-align:left;">  &nbsp;&nbsp;'.$cap.'</div>';
    $htmllocandesval ='<div style="font-size:14px;font-weight:900;text-align:left;">  &nbsp;&nbsp;'.$comune.'</div>';
    $htmlbollino = '<div style="font-size:10px;font-weight:900;text-align:left;">  &nbsp;&nbsp;BOLLO DELL\'UFFICIO POSTALE</div>';
    $htmlnotefondo = '<div style="font-size:8px;font-weight:400;text-align:right;border-bottom: solid 1px #000;">  codice bancoposta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;importo in euro &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; numero conto &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  tipo documento &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </div>';
    $htmlcodicefondo = '<div style="font-size:18px;font-weight:900;text-align:right;">  &nbsp;&nbsp;123 ></div>';


    $nperpagina =2;
    $hbo = $inc*100;
    $nbol2--;
    if($inc == $nperpagina) {
        $inc = 0;
        $hbo =0;
        $pdf::AddPage('L', 'A4');
    }
    $inc ++;
    if($inc == 2) {
        $hbo = $hbo+5;
        $pdf::writeHTMLCell(124, 4, 1, 1+$hbo-3, $htmlsegnotaglio, 0, 0, 0, true, '', true);
    }

    $pdf::writeHTMLCell(124, 4, 9, 2+$hbo, $htmlprimarigas, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(160, 4, 131, 2+$hbo, $htmlprimarigad, 0, 0, 0, true, '', true);


    $pdf::writeHTMLCell(10, 4, 9, 8.2+$hbo, $htmleuro, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(20, 4, 19, 13+$hbo, $html4, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(33, 4, 35, 11+$hbo, $htmlcc, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(20, 4, 68, 13+$hbo, $htmldie, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(34, 4, 80, 11+$hbo, $htmlcosto, 1, 0, 0, true, '', true);
    //$pdf::Cell(3, 4, 105, 10, ',', 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(5, 4, 111, 12+$hbo, $htmlvi, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(10, 4, 117, 11+$hbo, $htmlze, 1, 0, 0, true, '', true);


    $pdf::writeHTMLCell(10, 5, 138, 8.2+$hbo, $htmleuro, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(20, 5, 148, 12.9+$hbo, $html4, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(35, 5, 163, 11+$hbo, $htmlcc, 1, 0, 0, true, '', true);

    $pdf::writeHTMLCell(34, 4, 240, 11+$hbo, $htmlcosto, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(5, 5, 271, 12+$hbo, $htmlvi, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(10, 4, 277, 11+$hbo, $htmlze, 1, 0, 0, true, '', true);

    // secoda riga
    $pdf::writeHTMLCell(268, 10, '', '', '', 0, 0, false, true, '');
    $pdf::writeHTMLCell(40, 5, 9, 19+$hbo, $htmlimp, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(87, 5, 40, 17+$hbo, $htmlel, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(40, 5, 140, 17.5+$hbo, $htmlsigla, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(40, 5, 165, 19+$hbo, $htmlimp, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(87, 5, 200, 17+$hbo, $htmlel, 0, 0, 0, true, '', true);

    // terza riga intestato a:
    //$pdf::writeHTMLCell(268, 10, '', '', '', 0, 0, false, true, '');
    $pdf::writeHTMLCell(40, 4, 8, 22.5+$hbo, $htmlintest, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(40, 4, 140, 22.5+$hbo, $htmlintest, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(118, 4, 9, 26+$hbo, $htmlgru, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(148, 4, 140, 26+$hbo, $htmlgru, 1, 0, 0, true, '', true);

    $pdf::writeHTMLCell(118, 4, 9, 30.5+$hbo, $htmlgru2, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(148, 4, 140, 30.5+$hbo, $htmlgru2, 1, 0, 0, true, '', true);

    //causale
    $pdf::writeHTMLCell(40, 4, 9, 36+$hbo, $htmlcaus, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(40, 4, 140, 36+$hbo, $htmlcaus, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(118, 4, 9, 40+$hbo, $htmlquo, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(148, 4, 140, 40+$hbo, $htmlquo, 1, 0, 0, true, '', true);

    $pdf::writeHTMLCell(118, 4, 9, 44.5+$hbo, $htmlquo2, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(148, 4, 140, 44.5+$hbo, $htmlquo2, 1, 0, 0, true, '', true);

    //eseguito da
    $pdf::writeHTMLCell(40, 4, 8, 49.5+$hbo, $htmleseg, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(40, 4, 190, 49.5+$hbo, $htmleseg, 0, 0, 0, true, '', true);

    $pdf::writeHTMLCell(65, 5, 9, 53+$hbo, $htmlnome, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(98, 5, 190, 53+$hbo, $htmlnome, 1, 0, 0, true, '', true);

    $pdf::writeHTMLCell(65, 5, 9, 58+$hbo, $htmlvuota, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(98, 5, 190, 58+$hbo, $htmlvuota, 1, 0, 0, true, '', true);

    // via piazza cap localita SINISTRA
    $pdf::writeHTMLCell(65, 5, 9, 63+$hbo, $htmlvia, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(65, 5, 9, 68+$hbo, $htmlcap, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(65, 5, 9, 73+$hbo, $htmlloca, 1, 0, 0, true, '', true);

    // via piazza cap localita DESTRA
    $pdf::writeHTMLCell(65, 5, 187, 63+$hbo, $htmlviandes, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(98, 5, 190, 66+$hbo, $htmlviandesval, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(65, 5, 190, 71+$hbo, $htmlcapndes, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(65, 5, 235, 71+$hbo, $htmllocandes, 0, 0, 0, true, '', true);

    $pdf::writeHTMLCell(35, 5, 190, 74.4+$hbo, $htmlcapndesval, 1, 0, 0, true, '', true);
    $pdf::writeHTMLCell(50, 5, 238, 74.4+$hbo, $htmllocandesval, 1, 0, 0, true, '', true);


    //note a fondo
    $pdf::writeHTMLCell(50, 4, 85, 78+$hbo, $htmlbollino, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(50, 4, 138, 78+$hbo, $htmlbollino, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(289, 4, 5, 81+$hbo, $htmlnotefondo, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(285, 4, 5, 90+$hbo, $htmlcodicefondo, 0, 0, 0, true, '', true);

   // $pdf::writeHTMLCell(289, 4, 5, 96+$hbo, $htmlvuota, 0, 0, 0, true, '', true);
    $pdf::writeHTMLCell(2, 4, 135, 5+$hbo, $riga_vert, 0, 0, 0, true, '', true);
    $pdf::Ln(0);
    $pdf::AddPage();
}
       $pdf::SetFillColor(255, 255, 255);
       $filename ='Bollettino';

       $pdf::Output(public_path($filename), 'F');

       return response()->download(public_path($filename));


   }
      
}

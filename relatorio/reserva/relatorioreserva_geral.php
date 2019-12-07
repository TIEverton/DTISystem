<?php
include '../../config/DB.php';
include_once '../../controller/reserva/Reserva.DAO.php';

$html = '<center>
<img src="logo.png" style="height: 80px; margin-bottom: 10px;">
</center>';
$html .= '<center>
<b style="font-family: Arial, Helvetica, sans-serif; font-size: 16px;">RELATÓRIO GERAL - DTI SYSTEM</b>
</center>';
$html .= '<hr style="color: #0a003d;"></hr>
<b style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">TIPO DE RELATÓRIO:</b> <span style="margin-left: 0px;">Teste</span>
<br>';
$html .= '<b style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">CAMPUS:</b> <span style="margin-left: 82px;">Todos</span>
<br>';
$html .= '<b style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">INTERVALO:</b>  <span style="margin-left: 62px;">14/05/2019 até 14/06/2019</span>
<br>';
$html .= '<hr style="color: #0a003d;"></hr>';
$html .= '<table id="pesquisaTable" border="1" cellspacing=0 cellpadding=2 bordercolor="000000" style="font-family: Arial, Helvetica, sans-serif; font-size: 13px;">';
$html .= '<thead>';
$html .= '<tr style="background-color: #0052aa; color: white; text-align:center;vertical-align:middle;">';
$html .= '<th width="200">Responsável</th>';
$html .= '<th width="100">Campus</th>';
$html .= '<th width="100">Sala</th>';
$html .= '<th width="100">Equipamento</th>';
$html .= '<th width="100">Data</th>';
$html .= '<th width="80">Turno</th>';
$html .= '<th width="65">Horário</th></tr>';
    $reser = new reserva_DAO;
    $resultado = $reser->ListarReservas();

    foreach($resultado as $res){
    $html .= '<tr><td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['responsavel']."</td>";
    $html .= '<td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['campus']."</td>";
    $html .= '<td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['sala']."</td>";
    $html .= '<td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['equipamento']."</td>";
    $html .= '<td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['data']."</td>";
    $html .= '<td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['turno']."</td>";
    $html .= '<td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['horario']."</td>";
    }
$html .= '</thead>';
$html .= '</table>';
// include autoloader
require_once '../../dompdf/autoload.inc.php';
use Dompdf\Dompdf;



$dompdf = new Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream(
    "testederelatorio.pdf", 
    array(
        "Attachment" => false //Para realizar o download somente alterar para true
    )
);
?>
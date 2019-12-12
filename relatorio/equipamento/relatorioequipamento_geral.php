<?php
include '../../config/DB.php';
include_once '../../controller/equipamento/Equipamento.DAO.php';
include_once '../../controller/campus/Campus.DAO.php';

$campus = $_POST['select_campus'];
$campusDAO = new campus_DAO;
$instanciaCampus = $campusDAO->findUnic($campus);
$nomeCampus = $instanciaCampus['nome'];

if(!isset($nomeCampus)){
    $nomeCampus = 'Todos os Campus';
}

$html = '<center>
<img src="logo.png" style="height: 80px; margin-bottom: 10px;">
</center>';
$html .= '<center>
<b style="font-family: Arial, Helvetica, sans-serif; font-size: 16px;">RELATÓRIO GERAL - DTI SYSTEM</b>
</center>';
$html .= '<hr style="color: #0a003d;"></hr>
<b style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">TIPO DE RELATÓRIO:</b> <span style="margin-left: 0px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;">Relatório de <b>Equipamentos.</b></span>
<br>';
$html .= '<b style="font-family: Arial, Helvetica, sans-serif; font-size: 14px;">CAMPUS:</b> <span style="margin-left: 82px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;">'.$nomeCampus."</span>
<br>";
$html .= '<hr style="color: #0a003d;"></hr>';
$html .= '<table id="pesquisaTable" border="1" cellspacing=0 cellpadding=2 bordercolor="000000" style="font-family: Arial, Helvetica, sans-serif; font-size: 13px;">';
$html .= '<thead>';
$html .= '<tr style="background-color: #0052aa; color: white; text-align:center;vertical-align:middle;">';
$html .= '<th width="200">Campus</th>';
$html .= '<th width="187">Agrupamento</th>';
$html .= '<th width="120">Numeração</th>';
$html .= '<th width="250">Descrição</th>';
        $reser = new equipamento_DAO;
        $resultado = $reser->listarEquipamentoRelatorio($campus);

    foreach($resultado as $res){
    $html .= '<tr><td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['campus']."</td>";
    $html .= '<td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['agrupamento']."</td>";
    $html .= '<td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['numeracao']."</td>";
    $html .= '<td style="background: #eee; text-align:center;vertical-align:middle;">'.$res['descricao']."</td>";
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
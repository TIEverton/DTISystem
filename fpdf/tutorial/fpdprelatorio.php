    <?php
    include '../fpdf.php';
    include '../../config/DB.php';
    include_once '../../controller/reserva/Reserva.DAO.php';
    
    class myPDF extends FPDF{
        
        function header(){
            $contador = 0;
            $l = 5;
            $this->Image('logo.png',105,15,-350);
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(280,60,"Relátorio Geral",0,0,'C');
            $this->Ln();
            
            $this->SetFont('Arial','B',10);
            $this->Cell(35,-40,'Tipo de relátorio: ',0,0,'C');
            $this->SetFont('Arial','',10);
            $this->SetX(45);
            $this->Cell('',-40,'EQUIPAMENTO',0,0,'');
            $this->Ln();

            $this->SetFont('Arial','B',10);
            $this->Cell(21,50,'Campus: ',0,0,'C');
            $this->SetFont('Arial','',10);
            $this->SetX(45);
            $this->Cell('',50,'Clínica Escola',0,0,'');
            $this->Ln();

            $this->SetFont('Arial','B',10);
            $this->Cell(39, -40,'Intervalo de tempo: ',0,0,'C');
            $this->SetFont('Arial','',10);
            $this->SetX(45);
            $this->Cell('',-40,'14/05/2002'.' até '.'14/05/2002',0,0,'');
            $this->Ln();
            //TITULO DA TABELA DE SERVIÇOS
            $this->setY(70);
            $this->SetX(12);
            $this->SetFillColor(232,232,232);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','B',9.5);
            $this->Cell(70,$l,'Responsável',1,0,'C',1);
            $this->Cell(50,$l,'Campus',1,0,'C',1);
            $this->Cell(50,$l,'Sala',1,0,'C',1);
            $this->Cell(45,$l,'Data',1,0,'C',1);
            $this->Cell(30,$l,'Turno',1,0,'C',1);
            $this->Cell(30,$l,'Horário',1,0,'C',1);
    
            $reser = new reserva_DAO;
            $resultado = $reser->ListarReservas();
            foreach($resultado as $res){
                $this->setY(75+5*$contador);
                $this->SetX(12);
                $this->SetFillColor(255,255,255);
                $this->SetTextColor(0,0,0);
                $this->SetFont('Arial','',9.5);
                $this->Cell(70,$l,$res['responsavel'],1,0,'C',1);
                $this->Cell(50,$l,$res['campus'],1,0,'C',1);
                $this->Cell(50,$l,$res['sala'],1,0,'C',1);
                $this->Cell(45,$l,$res['data'],1,0,'C',1);
                $this->Cell(30,$l,$res['turno'],1,0,'C',1);
                $this->Cell(30,$l,$res['horario'],1,0,'C',1);
                $contador ++;
                if ($contador > 23) {
  
                    $contador = 0;
                }
            }

        }
        


        function footer(){
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L', 'A4',0);
    $pdf->Output();
    ?>
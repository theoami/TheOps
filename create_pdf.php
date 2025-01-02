<?php 


    if ( empty(session_id()) ){
        session_start();
    } 

    //print_r($_SERVER);

    require_once($_SERVER['DOCUMENT_ROOT'] . "/databases/access.php");
    
    $item = $json_lessons[0];              
    
    $workplaces = array_column($json_workplaces, 'id');
    $teachers = array_column($json_teachers, 'id');
    $students = array_column($json_students, 'id');
    $lesson_types = array_column($json_lessons_types, 'id');
    $lesson_durations = array_column($json_lessons_durations, 'id');
    $exercises = array_column($json_exercises, 'id');

    $found_workplace = array_search(strtolower($item['workplace']), array_map('strtolower',$workplaces));
    $found_teacher = array_search(strtolower($item['teacher']), array_map('strtolower',$teachers));
    $found_student = array_search(strtolower($item['student']), array_map('strtolower',$students));
    $found_lesson_type = array_search(strtolower($item['lesson-type']), array_map('strtolower',$lesson_types));
    $found_lesson_duration = array_search(strtolower($item['duration']), array_map('strtolower',$lesson_durations));
        
    require_once($_SERVER['DOCUMENT_ROOT'] . "/fpdf/fpdf.php");    
    //require_once($_SERVER['DOCUMENT_ROOT'] . "/tfpdf/tfpdf.php");    

    class PDF extends FPDF {

        // En-tête
        function Header(){
            // Logo
            $this->Image($_SERVER['DOCUMENT_ROOT'] . '/img/music.png',10,6,15);
            // Police Arial gras 15
            $this->SetFont('Arial','B',15);
            // Décalage à droite
            $this->Cell(w: 80);
            // Titre
            $this->Cell(30,10,'Titre',1,0,'C');
            // Saut de ligne
            $this->Ln(20);
        }

        // Pied de page
        function Footer(){
            // Positionnement à 1,5 cm du bas
            $this->SetY(-15);
            // Police Arial italique 8
            $this->SetFont('Arial','I',8);
            // Numéro de page
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }

    }

    // Instanciation de la classe dérivée
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);

    $pdf->Cell(0,10,'ID de la leçon : ' . $item["id"],0,1);
    $pdf->Cell(0,10,'Date de la leçon : ' . $item["lesson-date"],0,1);
    $pdf->Cell(0,10,'Lieu : ' . $json_workplaces[$found_workplace]["type"],0,1);
    
    $pdf->Cell(0,10,'Professeur : ' . $json_teachers[$found_teacher]["givenname"] . " " . $json_teachers[$found_teacher]["surname"] . " (" . $json_teachers[$found_teacher]["title"] . ")",0,1);
    $pdf->Cell(0,10,'Élève : ' . $json_students[$found_student]["givenname"] . " " . $json_students[$found_student]["surname"] . " (" . $json_students[$found_student]["title"] . ")",0,1);
    $pdf->Cell(0,10,'Type : ' . $json_lessons_types[$found_lesson_type]["type"],0,1);
    $pdf->Cell(0,10,'Durée : ' . $json_lessons_durations[$found_lesson_duration]["duration"],0,1);

    $pdf->Output();
    
    /*
    // Instantiate and use the FPDF class 
    $pdf = new FPDF();

    //Add a new page
    $pdf->AddPage();

    // Set the font for the text
    $pdf->SetFont('Arial', 'B', 18);

    // Prints a cell with given text 
    $pdf->Cell(60,20,'Hello GeeksforGeeks!');

    // return the generated output
    $pdf->Output();
    */

?>
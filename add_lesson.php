<?php 

    echo "<br/>";

    print_r($_POST);

    echo "<br/>";
    echo "<br/>ID EMPLACEMENT : " . $_POST["workplaces"];
    echo "<br/>DATE EXERCICE : " . $_POST["lesson-date"];
    echo "<br/>ID PROFESSEUR : " . $_POST["teacher"];
    echo "<br/>ID TYPE DE LECON : " . $_POST["lesson-type"];
    echo "<br/>ID DUREE DE LECON : " . $_POST["lesson-duration"];
    echo "<br/>ID ELEVE : " . $_POST["student"];

    echo "<br/>";

    $myDateTime = DateTime::createFromFormat('m-d-Y', $_POST["lesson-date"]);
    $newDateString = $myDateTime->format('d-m-Y');

    $_POST["lesson-date"] = $newDateString;

    $json_activities = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/lessons.json");    
    $tempArray = json_decode($json_activities);
    $tempArray1 = json_decode($json_activities,true);

    $max_value = 0;
    foreach($tempArray as $key => $value) {
        if($value->id > $max_value){
            $max_value = $value->id;
        }
    }

    $lastID = $max_value + 1;

    $lesson = array(    
                        "id"=>$lastID,
                        "workplace"=>$_POST["workplaces"],
                        "lesson-date"=>$_POST["lesson-date"],
                        "teacher"=>$_POST["teacher"],
                        "comment"=>"",
                        "student"=>$_POST["student"],
                        "lesson-type"=>$_POST["lesson-type"],
                        "duration"=>$_POST["lesson-duration"]
    );

    array_push($tempArray, $lesson);

    $jsonData = json_encode($tempArray,JSON_PRETTY_PRINT);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/lessons.json", $jsonData);

?>
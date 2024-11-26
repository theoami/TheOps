<?php 

    echo "<br/>";

    print_r($_POST);

    echo "<br/>";
    echo "<br/>ID EMPLACEMENT : " . $_POST["workplaces"];
    echo "<br/>DATE EXERCICE : " . $_POST["exercise-date"];
    echo "<br/>ID PROFESSEUR : " . $_POST["teacher"];
    echo "<br/>ID ELEVE : " . $_POST["student"];

    echo "<br/> EXERCICES :<br/>";

    print_r($_POST["exercises"]);

    echo "<br/>";

    $myDateTime = DateTime::createFromFormat('m-d-Y', $_POST["exercise-date"]);
    $newDateString = $myDateTime->format('d-m-Y');

    $_POST["exercise-date"] = $newDateString;

    $json_activities = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/activities.json");    
    $tempArray = json_decode($json_activities);

    foreach( $_POST["exercises"] as $exercise ) {

        $activity = array(  "workplace"=>$_POST["workplaces"],
                            "exercise-date"=>$_POST["exercise-date"],
                            "teacher"=>$_POST["teacher"],
                            "exercise"=>$exercise,
                            "comment"=>"",
                            "student"=>$_POST["student"]
        );

        array_push($tempArray, $activity);

    }

    $jsonData = json_encode($tempArray,JSON_PRETTY_PRINT);
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/activities.json", $jsonData);

?>
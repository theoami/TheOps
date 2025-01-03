<?php 

    function show_post_values($post_values) {

        echo "<p><strong style='font-weight: bold;' >Valeurs POST :</strong> ";

        print_r($post_values);
    
        echo "</p>";

    }
    
    function add_warm_up(int $lesson_id, int $exercise_id){

        echo "<p><strong style='font-weight: bold;' > > (START) function add_warm_up</strong></p>";

        echo "<p><strong style='font-weight: bold;' > >> Numéro d'exercice :</strong> ". $exercise_id . "</p>";

        $objectsActivities = get_data_in_json("activities");

        $find_exercise = false;

        foreach( $objectsActivities as $element ) {

            if( $lesson_id == $element->lesson ){
                
                if( $exercise_id == $element->exercise ){

                    $find_exercise = true;

                }

            }

        }            
        
        if( $find_exercise === true ){

            echo "<p><strong style='font-weight: bold;' > >> Exercice déjà rattaché à une leçon : </strong>Oui</p>";

        }else{

            echo "<p><strong style='font-weight: bold;' > >> Exercice déjà rattaché à une leçon : </strong>Non</p>";

            echo "<p><strong style='font-weight: bold;' > >> Ajout dans la table</strong></p>";

            $activity = array(  "lesson"=>$lesson_id,
                        "exercise"=>$exercise_id,
                        "comment"=>""
            );

            array_push($objectsActivities, $activity);

        }

        save_data_in_json("activities",$objectsActivities);   

        echo "<p><strong style='font-weight: bold;' > > (END) function add_warm_up</strong></p>";

    }

    function get_data_in_json(string $tableName){

        echo "<p><strong style='font-weight: bold;' > > (START) function get_data_in_json</strong></p>";

        $fullname = $_SERVER['DOCUMENT_ROOT'] . "/databases/" . $tableName . ".json";
        
        echo "<p><strong style='font-weight: bold;' > >> Chemin de la table JSON : </strong>" . $fullname . "</p>";

        $jsonContent = file_get_contents($fullname);    
        $jsonObjects = json_decode($jsonContent);

        echo "<p><strong style='font-weight: bold;' > >> Récupération des éléments de la table</strong></p>";

        echo "<p><strong style='font-weight: bold;' > > (END) function get_data_in_json</strong></p>";

        return $jsonObjects;

    }

    function save_data_in_json(string $tableName,$objects){

        echo "<p><strong style='font-weight: bold;' > > (START) function save_data_in_json</strong></p>";
        
        $fullname = $_SERVER['DOCUMENT_ROOT'] . "/databases/" . $tableName . ".json";

        echo "<p><strong style='font-weight: bold;' > >> Chemin de la table JSON : </strong>" . $fullname . "</p>";
        
        $jsonData = json_encode($objects,JSON_PRETTY_PRINT);

        file_put_contents($fullname, $jsonData);

        echo "<p><strong style='font-weight: bold;' > >> Mise à jour de la table</strong></p>";

        echo "<p><strong style='font-weight: bold;' > > (END) function save_data_in_json</strong></p>";

    }

    function add_lesson($lesson_date,$workplace,$teacher,$student,$lesson_type,$lesson_duration){
     
        echo "<p><strong style='font-weight: bold;' >Date de la leçon :</strong> ". $lesson_date . "</p>";
        echo "<p><strong style='font-weight: bold;' >ID du lieu du cours :</strong> ". $workplace . "</p>";
        echo "<p><strong style='font-weight: bold;' >ID du professeur :</strong> ". $teacher . "</p>";
        echo "<p><strong style='font-weight: bold;' >ID de l'élève :</strong> ". $student . "</p>";
        echo "<p><strong style='font-weight: bold;' >ID du type de leçon :</strong> ". $lesson_type . "</p>";
        echo "<p><strong style='font-weight: bold;' >ID de la durée de la leçon :</strong> ". $lesson_duration . "</p>";

        $myDateTime = DateTime::createFromFormat('m-d-Y', $lesson_date);
        $newDateString = $myDateTime->format('d-m-Y');
        $lesson_date = $newDateString;

        $objectsLessons = get_data_in_json("lessons");

        $find_lesson = false;
        $id_lesson = null;

        foreach( $objectsLessons as $element ) {

            if( $lesson_date == $element->{"lesson-date"} ){

                if( $workplace == $element->workplace ){

                    if( $teacher == $element->teacher ){

                        if( $student == $element->student ){

                            if( $lesson_type == $element->{"lesson-type"} ){

                                if( $lesson_duration == $element->duration ){

                                    $find_lesson = true;
                                    $id_lesson = $element->id;
                    
                                }
                
                            }
            
                        }
        
                    }

                }

            }

        }

        if( $find_lesson === true ){

            echo "<p><strong style='font-weight: bold;' > > Leçon avec les mêmes paramètres pour la date '" . $lesson_date . "' est déjà enregistrée : </strong>Oui</p>";

        }else{

            echo "<p><strong style='font-weight: bold;' > > Leçon avec les mêmes paramètres pour la date '" . $lesson_date . "' est déjà enregistrée : </strong>Non</p>";
            
            echo "<p><strong style='font-weight: bold;' > >> Recherche du dernier ID</strong></p>";

            $max_value = 0;
            foreach($objectsLessons as $key => $value) {
                if($value->id > $max_value){
                    $max_value = $value->id;
                }
            }

            $lastID = $max_value + 1;
            $id_lesson = $lastID;

            echo "<p><strong style='font-weight: bold;' > >> ID pour le nouvel enregistrement : </strong>" . $lastID . "</p>";

            echo "<p><strong style='font-weight: bold;' > >> Ajout dans la table</strong></p>";

            $lesson = array(    
                                "id"=>$lastID,
                                "workplace"=>$workplace,
                                "lesson-date"=>$lesson_date,
                                "teacher"=>$teacher,
                                "comment"=>"",
                                "student"=>$student,
                                "lesson-type"=>$lesson_type,
                                "duration"=>$lesson_duration
            );

            array_push($objectsLessons, $lesson);

            save_data_in_json("lessons",$objectsLessons);

        }

        return $id_lesson;

    }

    show_post_values($_POST);

    switch ( $_POST["form-type"] ) {

        case "warm-up":
    
            echo "<p><strong style='font-weight: bold;' >Numéro de leçon :</strong> ". $_POST["lesson"] . "</p>";
    
            if( isset($_POST["exercises"]) ){
    
                echo "<p style='font-weight: bold;color:green;' >De(s) exercice(s) coché(s)</p>";
                
                foreach( $_POST["exercises"] as $exercise ) {
    
                    add_warm_up($_POST["lesson"],$exercise);
        
                }
            
            }else{
    
                echo "<p style='font-weight: bold;color:red;' >Pas d'exercice coché</p>";
    
            }

          break;

        case "lesson":
               
            $id_lesson = add_lesson($_POST["lesson-date"],$_POST["workplaces"],$_POST["teacher"],$_POST["student"],$_POST["lesson-type"],$_POST["lesson-duration"]);

            echo "<p><strong style='font-weight: bold;' >ID de la leçon :</strong> ". $id_lesson . "</p>";

            if( isset($_POST["exercises"]) ){
    
                echo "<p style='font-weight: bold;color:green;' >De(s) exercice(s) coché(s)</p>";
                
                foreach( $_POST["exercises"] as $exercise ) {
    
                    add_warm_up($id_lesson,$exercise);
        
                }
            
            }else{
    
                echo "<p style='font-weight: bold;color:red;' >Pas d'exercice coché</p>";
    
            }

            break;

        default:
          echo "<p style='font-weight: bold;color:red;' >Formulaire inconnu</p>";

    }
    
?>
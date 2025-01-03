<?php

    if( $_SERVER["SERVER_NAME"] == "theops" ){

        $dbName = "theops";
        $dbServer = "localhost";
        $dbUser = "root";
        $dbPassword = "";

    }elseif( $_SERVER["SERVER_NAME"] == "theops.ovh" ){

        $dbName = "theopsmwrs";
        $dbServer = "theopsmwrs.mysql.db";
        $dbUser = "theopsmwrs";
        $dbPassword = "cbvFrs9DTXSBe23tTUhWteY8ZpPZHu";

    }else{

        throw new Exception('Serveur inconnu');

    }

    try{
        $mysqlClient = new PDO('mysql:host='.$dbServer.';dbname='. $dbName .';charset=utf8', $dbUser, $dbPassword);
    }catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }

    // Si tout va bien, on peut continuer

    // On récupère tout le contenu de la table workplaces
    $sqlQuery = 'SELECT * FROM workplaces';
    $workplacesStatement = $mysqlClient->prepare($sqlQuery);
    $workplacesStatement->execute();
    $workplaces = $workplacesStatement->fetchAll();

    // On récupère tout le contenu de la table types_of_exercise
    $sqlQuery = 'SELECT * FROM types_of_exercise';
    $typesOfExerciseStatement = $mysqlClient->prepare($sqlQuery);
    $typesOfExerciseStatement->execute();
    $typesOfExercise = $typesOfExerciseStatement->fetchAll();

    // On récupère tout le contenu de la table payment_types
    $sqlQuery = 'SELECT * FROM payment_types';
    $paymentTypesStatement = $mysqlClient->prepare($sqlQuery);
    $paymentTypesStatement->execute();
    $paymentTypes = $paymentTypesStatement->fetchAll();

    // On récupère tout le contenu de la table lesson_types
    $sqlQuery = 'SELECT * FROM lesson_types';
    $lessonTypesStatement = $mysqlClient->prepare($sqlQuery);
    $lessonTypesStatement->execute();
    $lessonTypes = $lessonTypesStatement->fetchAll();

    // On récupère tout le contenu de la table lesson_durations
    $sqlQuery = 'SELECT * FROM lesson_durations ORDER BY duration';
    $lessonDurationsStatement = $mysqlClient->prepare($sqlQuery);
    $lessonDurationsStatement->execute();
    $lessonDurations = $lessonDurationsStatement->fetchAll();

    // On récupère tout le contenu de la vue v_teachers
    $sqlQuery = 'SELECT * FROM `v_teachers`';
    $teachersStatement = $mysqlClient->prepare($sqlQuery);
    $teachersStatement->execute();
    $teachers = $teachersStatement->fetchAll();

    // On récupère tout le contenu de la vue v_students
    $sqlQuery = 'SELECT * FROM `v_students`';
    $studentsStatement = $mysqlClient->prepare($sqlQuery);
    $studentsStatement->execute();
    $students = $studentsStatement->fetchAll();

    // On récupère tout le contenu de la vue v_warmsup
    $sqlQuery = 'SELECT * FROM `v_warmsup`';
    $warmsupStatement = $mysqlClient->prepare($sqlQuery);
    $warmsupStatement->execute();
    $warmsup = $warmsupStatement->fetchAll();

    // On récupère tout le contenu de la vue v_improvisations
    $sqlQuery = 'SELECT * FROM `v_improvisations`';
    $improvisationsStatement = $mysqlClient->prepare($sqlQuery);
    $improvisationsStatement->execute();
    $improvisations = $improvisationsStatement->fetchAll();

    // On récupère tout le contenu de la vue v_lessons
    $sqlQuery = 'SELECT * FROM `v_lessons`';
    $lessonsStatement = $mysqlClient->prepare($sqlQuery);
    $lessonsStatement->execute();
    $lessons = $lessonsStatement->fetchAll();

    // On récupère tout le contenu de la vue types_of_exercise
    $sqlQuery = 'SELECT * FROM `types_of_exercise`';
    $typesOfExerciseStatement = $mysqlClient->prepare($sqlQuery);
    $typesOfExerciseStatement->execute();
    $typesOfExercise = $typesOfExerciseStatement->fetchAll();
    
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>TheOps</title>
        <link href="img/favicon.png" rel="icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
        <style>

            /* Set black background color, white text and some padding */
            footer {

                background-color: #555;
                color: white;
                padding: 15px;

                
                position: fixed;
                bottom: 0;
                width: 100%;

            }

            footer>p {
                margin : 0;
                text-align: center;
            }

        </style>
    </head>

    <body style="background-color:#4741412e;" >

        <div class="container-fluid" >
            
            <div class="row">
                <div class="col-lg-2">
                    <h1 style="text-transform: uppercase;"><span style="color:#ffffff;">The</span><span style="color:#4ECDC4;">Ops</span><span style="color:#ffeb3b;">Musique</span></h1>
                </div>
                <div class="col-lg-10">
                </div>            
            </div>
            
            <div class="row">

                <div class="col-lg-2">

                    <div class="panel panel-primary">
                        <div class="panel-body ">
                            <ul class="nav nav-pills nav-stacked" id="nav-menu">
                                <li class="active" id="menu-home" ><a href="#">Accueil</a></li>
                                <li id="menu-persons" ><a href="#">Personnes</a></li>
                                <li id="menu-lessons" ><a href="#">Leçons</a></li>
                                <li id="menu-exercises" ><a href="#">Exercices</a></li>
                                <li id="menu-parameters" ><a href="#">Paramètres</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>

                <div class="col-lg-10" style="display:inherit;" id="menu-content-home" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">Accueil</div>
                        <div class="panel-body"></div>
                    </div>
                </div>

                <div class="col-lg-10" style="display:none;" id="menu-content-lessons" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">Leçons</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="8%" >Date</th>
                                        <th width="10%" >Lieu</th>
                                        <th width="14%" >Professeur</th>
                                        <th width="14%" >Élève</th>
                                        <th width="8%" >Type de leçon</th>
                                        <th width="6%" >Durée</th>
                                        <th>Commentaires</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($lessons as $lesson) {

?>
                                    <tr>
                                        <td><?php echo $lesson['lesson_date']; ?></td>
                                        <td><?php echo $lesson['workplace_name']; ?></td>
                                        <td><?php echo $lesson['teacher_givenname']; ?> <?php echo $lesson['teacher_surname']; ?> (<?php echo $lesson['teacher_title_abbreviation']; ?>)</td>
                                        <td><?php echo $lesson['student_givenname']; ?> <?php echo $lesson['student_surname']; ?> (<?php echo $lesson['student_title_abbreviation']; ?>)</td>
                                        <td><?php echo $lesson['lesson_type']; ?></td>
                                        <td><?php echo $lesson['duration']; ?></td>
                                        <td><?php echo $lesson['comment']; ?></td>
                                    </tr>
<?php

    }

?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10" style="display:none;" id="menu-content-exercises" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">Echauffements</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="10%" >Echauffement</th>
                                        <th>Explications</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($warmsup as $warmup) {

?>
                                    <tr>
                                        <td><?php echo $warmup['exercise_name']; ?></td>
                                        <td><?php echo nl2br($warmup['description']); ?></td>
                                    </tr>
<?php

    }

?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Improvisations</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="10%" >Improvisation</th>
                                        <th>Explications</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($improvisations as $improvisation) {

?>
                                    <tr>
                                        <td><?php echo $improvisation['exercise_name']; ?></td>
                                        <td><?php echo nl2br($improvisation['description']); ?></td>
                                    </tr>
<?php

    }

?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Ajout d'un exercice</div>
                        <div class="panel-body">
                            <div class="form-panel">
                                <form action="process_form.php" method="POST" class="form-horizontal style-form">

                                    <div class="input-group col-xs-11 col-sm-11 col-md-6 col-lg-12">
                                        
                                        <span class="input-group-addon">Type</span>
                                        <div class="col-md-3 col-xs-11">
                            <?php 

                                        foreach($typesOfExercise as $typeOfExercise) {

                                        $itemChecked = "";

                                        if( $typeOfExercise["id"] == 1 ){
                                            $itemChecked = "checked";
                                        }
                                
                            ?>
                                        <div class="radio">
                                            <label>
                                            <input required type="radio" name="types_of_exercise" id="types_of_exercise_<?php echo $typeOfExercise["id"]; ?>" value="<?php echo $typeOfExercise["id"]; ?>" <?php echo $itemChecked; ?> >
                                            <?php echo $typeOfExercise["type"]; ?>
                                            </label>
                                        </div>
                            <?php           
                                        }
                            ?>
                                        </div>

                                    </div>
                                        
                                    <div class="input-group col-xs-11 col-sm-11 col-md-6 col-lg-12">
                                        <span class="input-group-addon">Echauffement</span>
                                        <input id="msg" type="text" class="form-control" name="msg" placeholder="Nom de l'échauffement" />
                                    </div>

                                    <div class="input-group col-xs-11 col-sm-11 col-md-6 col-lg-12">

                                        <span class="input-group-addon">Description</span>
                                        <textarea class="form-control" style="resize:none;" id="story" name="story" ></textarea>
                                
                                    </div>
                                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10 mt-2">
                                            <button class="btn btn-theme" type="submit">Ajout</button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10" style="display:none;" id="menu-content-persons" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">Professeurs</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="4%" >ID</th>
                                        <th width="4%" >Titre</th>
                                        <th width="46%" >Prénom</th>
                                        <th width="46%" >Nom</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($teachers as $teacher) {

?>
                                    <tr>
                                        <td><?php echo $teacher['user_id']; ?></td>
                                        <td><?php echo $teacher['title_abbreviation']; ?></td>
                                        <td><?php echo $teacher['givenname']; ?></td>
                                        <td><?php echo $teacher['surname']; ?></td>
                                    </tr>
<?php

    }

?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Élèves</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="4%" >ID</th>
                                        <th width="4%" >Titre</th>
                                        <th width="46%" >Prénom</th>
                                        <th width="46%" >Nom</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($students as $student) {

?>
                                    <tr>
                                        <td><?php echo $student['user_id']; ?></td>
                                        <td><?php echo $student['title_abbreviation']; ?></td>
                                        <td><?php echo $student['givenname']; ?></td>
                                        <td><?php echo $student['surname']; ?></td>
                                    </tr>
<?php

    }

?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10" style="display:none;" id="menu-content-parameters" >

                    <div class="panel panel-primary">
                        <div class="panel-heading">Lieux des cours</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="4%" >ID</th>
                                        <th>Type</th>
                                        <th width="8%" >Par défaut</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($workplaces as $workplace) {

?>
                                    <tr>
                                        <td><?php echo $workplace['id']; ?></td>
                                        <td><?php echo $workplace['type']; ?></td>
                                        <td><?php if( $workplace['default_w'] == 1 ){ echo "Oui"; }else{ echo "Non"; }; ?></td>
                                    </tr>
<?php

    }

?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">Types d'exercice</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="4%" >ID</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($typesOfExercise as $typeOfExercise) {

?>
                                    <tr>
                                        <td><?php echo $typeOfExercise['id']; ?></td>
                                        <td><?php echo $typeOfExercise['type']; ?></td>
                                    </tr>
<?php

    }

?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">Types de paiement</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="4%" >ID</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($paymentTypes as $paymentType) {

?>
                                    <tr>
                                        <td><?php echo $paymentType['id']; ?></td>
                                        <td><?php echo $paymentType['type']; ?></td>
                                    </tr>
<?php

    }

?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">Types de leçon</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="4%" >ID</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($lessonTypes as $lessonType) {

?>
                                    <tr>
                                        <td><?php echo $lessonType['id']; ?></td>
                                        <td><?php echo $lessonType['type']; ?></td>
                                    </tr>
<?php

    }

?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">Durées de leçon</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="4%" >ID</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($lessonDurations as $lessonDuration) {

?>
                                    <tr>
                                        <td><?php echo $lessonDuration['id']; ?></td>
                                        <td><?php echo $lessonDuration['duration']; ?></td>
                                    </tr>
<?php

    }

?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!--
        <footer class="container-fluid">
            <p>Copyright 2025 par Théo Fleury<br/>Tous droits réservés</p>
        </footer>
        -->

    </body>

        <script  >

            $( "li" ).on( "click", function() {
    
                var navMenu = document.getElementById('nav-menu');
                var children = navMenu.children;
                
                for (var i=0; i < children.length; i++) {
                    children[i].classList.remove('active');       
                }

                $( this ).addClass("active");

                //console.log($( this ));

                var optionMenu = ($( this )[0].id).replace("menu-","");

                console.log('Menu           : ' + $( this )[0].id );
                console.log('Option du menu : ' + optionMenu);

                var menuContentName = 'menu-content-' + optionMenu;
                console.log('Nom du contenu : ' + menuContentName);

                var menuContent = document.getElementById( menuContentName );

                //console.log(menuContent);

                const menuContents = document.querySelectorAll("[id^='menu-content-']");

                for (var i=0; i < menuContents.length; i++) {

                    if( menuContents[i].id != menuContentName ){

                        menuContents[i].style.display = "none";

                    }

                }

                menuContent.style.display = "inherit";

            } );

        </script>

</html>
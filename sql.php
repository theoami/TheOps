<?php

    $database = "theops";

    try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname='. $database .';charset=utf8', 'root', '');
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
    $sqlQuery = 'SELECT * FROM lesson_durations';
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
                    <h1 style="text-transform: uppercase;"><span style="color:#ffffff;">The</span><span style="color:#4ECDC4;">Ops</span></h1>
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
                                <li id="menu-teachers" ><a href="#">Professeurs</a></li>
                                <li id="menu-students" ><a href="#">Élèves</a></li>
                                <li id="menu-warmups" ><a href="#">Echauffements</a></li>
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

                <div class="col-lg-10" style="display:none;" id="menu-content-warmups" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">Echauffements</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th>Echauffement</th>
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
                </div>

                <div class="col-lg-10" style="display:none;" id="menu-content-exercises" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">Exercices</div>
                        <div class="panel-body"></div>
                    </div>
                </div>

                <div class="col-lg-10" style="display:none;" id="menu-content-teachers" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">Professeurs</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="4%" >ID</th>
                                        <th>Titre</th>
                                        <th>Prénom</th>
                                        <th>Nom</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($teachers as $teacher) {

?>
                                    <tr>
                                        <td><?php echo $teacher['user_id']; ?></td>
                                        <td><?php echo $teacher['abbreviation']; ?></td>
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
                </div>
                <div class="col-lg-10" style="display:none;" id="menu-content-students" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">Élèves</div>
                        <div class="panel-body">
                            <table class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th width="4%" >ID</th>
                                        <th>Titre</th>
                                        <th>Prénom</th>
                                        <th>Nom</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
                        // On affiche chaque lieu de cours un à un
    foreach ($students as $student) {

?>
                                    <tr>
                                        <td><?php echo $student['user_id']; ?></td>
                                        <td><?php echo $student['abbreviation']; ?></td>
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
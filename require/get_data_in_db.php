<?php

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
<?php

    //region TEACHERS

        // Read the JSON file
        $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/teachers.json");
        
        // Check if the file was read successfully
        if ($json === false) {
            die('Error reading the JSON file');
        }

        // Decode the JSON file
        $json_teachers = json_decode($json, true); 

        // Check if the JSON was decoded successfully
        if ($json_teachers === null) {
            die('Error decoding the JSON file');
        }

    //endregion TEACHERS

    //region STUDENTS

        // Read the JSON file
        $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/students.json");
        
        // Check if the file was read successfully
        if ($json === false) {
            die('Error reading the JSON file');
        }

        // Decode the JSON file
        $json_students = json_decode($json, true); 

        // Check if the JSON was decoded successfully
        if ($json_students === null) {
            die('Error decoding the JSON file');
        }

    //endregion STUDENTS

    //region LESSONS TYPES

        // Read the JSON file
        $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/lessons-types.json");
        
        // Check if the file was read successfully
        if ($json === false) {
            die('Error reading the JSON file');
        }

        // Decode the JSON file
        $json_lessons_types = json_decode($json, true); 

        // Check if the JSON was decoded successfully
        if ($json_lessons_types === null) {
            die('Error decoding the JSON file');
        }

    //endregion LESSONS TYPES

    //region TYPES OF EXERCISE

        // Read the JSON file
        $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/types-of-exercise.json");
        
        // Check if the file was read successfully
        if ($json === false) {
            die('Error reading the JSON file');
        }

        // Decode the JSON file
        $json_types_of_exercise = json_decode($json, true); 

        // Check if the JSON was decoded successfully
        if ($json_types_of_exercise === null) {
            die('Error decoding the JSON file');
        }

    //endregion TYPES OF EXERCISE

    //region TYPES OF EXERCISE

        // Read the JSON file
        $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/workplaces.json");
        
        // Check if the file was read successfully
        if ($json === false) {
            die('Error reading the JSON file');
        }

        // Decode the JSON file
        $json_workplaces = json_decode($json, true); 

        // Check if the JSON was decoded successfully
        if ($json_workplaces === null) {
            die('Error decoding the JSON file');
        }

    //endregion TYPES OF EXERCISE

    //region TYPES OF EXERCISE

        // Read the JSON file
        $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/payment-types.json");
        
        // Check if the file was read successfully
        if ($json === false) {
            die('Error reading the JSON file');
        }

        // Decode the JSON file
        $json_payment_types = json_decode($json, true); 

        // Check if the JSON was decoded successfully
        if ($json_payment_types === null) {
            die('Error decoding the JSON file');
        }

    //endregion TYPES OF EXERCISE

?>
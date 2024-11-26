<?php

    //echo $_SERVER['SERVER_NAME'];
    //echo $_SERVER['DOCUMENT_ROOT'];

    require_once($_SERVER['DOCUMENT_ROOT'] . "/databases/access.php");

    function function_alert($message) {
    
        // Display the alert box 
        echo "<script>alert('$message');</script>";
    }

    function redirectToUrl(string $url): never
    {
        header("Location: {$url}");
        exit();
    }

    //function_alert("NOT FIND");
    //$key = array_search($_POST["connect-id"], $json_students);
    //$found_key = array_search($_POST["connect-id"], $emails);

    $user_key = null;

    //region STUDENTS

        $emails = array_column($json_students, 'email');
        $pseudos = array_column($json_students, 'pseudo');

        $found_key = array_search(strtolower($_POST["connect-id"]), array_map('strtolower',$emails));

        if( $found_key === false ){

            $found_key = array_search(strtolower($_POST["connect-id"]), array_map('strtolower',$pseudos));
            
            if( $found_key === false ){

                //function_alert("NOT FIND STUDENT");

            }else{

                $user = $json_students[$found_key];
                $user_type = "student";
                
            }

        }else{

            $user = $json_students[$found_key];
            $user_type = "student";

        }

    //endregion STUDENTS

    if( !isset($user_key) ){

        //region TEACHERS

            $emails = array_column($json_teachers, 'email');
            $pseudos = array_column($json_teachers, 'pseudo');

            $found_key = array_search(strtolower($_POST["connect-id"]), array_map('strtolower',$emails));

            if( $found_key === false ){

                $found_key = array_search(strtolower($_POST["connect-id"]), array_map('strtolower',$pseudos));
                
                if( $found_key === false ){

                    //function_alert("NOT FIND TEACHER");

                }else{

                    $user = $json_teachers[$found_key];
                    $user_type = "teacher";
                    
                }

            }else{

                $user = $json_teachers[$found_key];
                $user_type = "teacher";

            }

        //endregion TEACHERS

    }

    if( isset($user) ){

        $verify = password_verify($_POST["connect-password"], $user["password"]);

        if($verify){

            function_alert("GOOD PASSWORD");

            print_r( $user);
            //session_destroy();
            if ( empty(session_id()) ){
                session_start();
            }
            $_SESSION['user-informations'] = $user;
    
            if( $user_type == 'teacher' ){
                $_SESSION['user-type'] = "Professeur";
            }elseif( $user_type == 'student' ){
                $_SESSION['user-type'] = "Élève";
            }else{
                $_SESSION['user-type'] = "";
            }
    
            echo "<br/>";
            print_r( $_SESSION['user-informations']);
            //redirectToUrl($_SERVER['DOCUMENT_ROOT'] . './index.php');

            echo "<br/>";

            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                
                echo 'https://' . $_SERVER['HTTP_HOST'] . '/index.php';
                redirectToUrl('https://' . $_SERVER['HTTP_HOST'] . '/index.php');

            }else{
                
                echo 'http://' . $_SERVER['HTTP_HOST'] . '/index.php';
                redirectToUrl('http://' . $_SERVER['HTTP_HOST'] . '/index.php');

            }

        }else{

            //redirectToUrl($_SERVER['DOCUMENT_ROOT'] . './login.html?bad-password');
            
            echo "<br/>";

            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {

                echo 'https://' . $_SERVER['HTTP_HOST'] . '/login.php?bad-password';
                redirectToUrl('https://' . $_SERVER['HTTP_HOST'] . '/login.php?bad-password');

            }else{

                echo 'http://' . $_SERVER['HTTP_HOST'] . '/login.php?bad-password';
                redirectToUrl('http://' . $_SERVER['HTTP_HOST'] . '/login.php?bad-password');

            }

        }

    }else{

        function_alert("NOT FIND");

    }

?>
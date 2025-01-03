<?php

    //region TEACHERS

        // Read the JSON file
        $json = file_get_contents("./teachers.json");
        
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
        $json = file_get_contents("./students.json");
        
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
        $json = file_get_contents("./lessons-types.json");
        
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
        $json = file_get_contents("./types-of-exercise.json");
        
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
        $json = file_get_contents("./workplaces.json");
        
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
        $json = file_get_contents("./payment-types.json");
        
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

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Le titre de ma page</title>
    </head>
    <body>

        <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
            font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg .tg-hmyn{font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif !important;text-align:left;vertical-align:top}
            .tg .tg-qy72{font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif !important;font-weight:bold;text-align:center;
            vertical-align:top}
        </style>

        <table class="tg" style="undefined;table-layout: fixed; width: 507px">

            <colgroup>
                <col style="width: 98px">
                <col style="width: 182px">
                <col style="width: 83px">
                <col style="width: 144px">
            </colgroup>

            <thead>
                <tr>
                    <th class="tg-qy72">ID</th>
                    <th class="tg-qy72">Titre</th>
                    <th class="tg-qy72">Prénom</th>
                    <th class="tg-qy72">Nom</th>
                </tr>
            </thead>

            <tbody>
<?php 

                foreach($json_teachers as $item) {
                    
?>
                    <tr>
                        <td class="tg-hmyn"><?php echo $item['id']; ?></td>
                        <td class="tg-hmyn"><?php echo $item['title']; ?></td>
                        <td class="tg-hmyn"><?php echo $item['givenname']; ?></td>
                        <td class="tg-hmyn"><?php echo $item['surname']; ?></td>
                    </tr>
<?php           
                }
?>
            </tbody>

        </table>

        <br/>
        
        <table class="tg" style="undefined;table-layout: fixed; width: 507px">

            <colgroup>
                <col style="width: 98px">
                <col style="width: 182px">
            </colgroup>

            <thead>
                <tr>
                    <th class="tg-qy72">ID</th>
                    <th class="tg-qy72">Type</th>
                </tr>
            </thead>

            <tbody>
<?php 

                foreach($json_lessons_types as $item) {
                    
?>
                    <tr>
                        <td class="tg-hmyn"><?php echo $item['id']; ?></td>
                        <td class="tg-hmyn"><?php echo $item['type']; ?></td>
                    </tr>
<?php           
                }
?>
            </tbody>

        </table>

        <br/>

        <table class="tg" style="undefined;table-layout: fixed; width: 507px">

            <colgroup>
                <col style="width: 98px">
                <col style="width: 182px">
                <col style="width: 83px">
                <col style="width: 144px">
            </colgroup>

            <thead>
                <tr>
                    <th class="tg-qy72">ID</th>
                    <th class="tg-qy72">Titre</th>
                    <th class="tg-qy72">Prénom</th>
                    <th class="tg-qy72">Nom</th>
                </tr>
            </thead>

            <tbody>
<?php 

                foreach($json_students as $item) {
                    
?>
                    <tr>
                        <td class="tg-hmyn"><?php echo $item['id']; ?></td>
                        <td class="tg-hmyn"><?php echo $item['title']; ?></td>
                        <td class="tg-hmyn"><?php echo $item['givenname']; ?></td>
                        <td class="tg-hmyn"><?php echo $item['surname']; ?></td>
                    </tr>
<?php           
                }
?>
            </tbody>

        </table>

        <br/>
        
        <table class="tg" style="undefined;table-layout: fixed; width: 507px">

            <colgroup>
                <col style="width: 98px">
                <col style="width: 182px">
            </colgroup>

            <thead>
                <tr>
                    <th class="tg-qy72">ID</th>
                    <th class="tg-qy72">Type</th>
                </tr>
            </thead>

            <tbody>
<?php 

                foreach($json_types_of_exercise as $item) {
                    
?>
                    <tr>
                        <td class="tg-hmyn"><?php echo $item['id']; ?></td>
                        <td class="tg-hmyn"><?php echo $item['type']; ?></td>
                    </tr>
<?php           
                }
?>
            </tbody>

        </table>

        <br/>
        
        <table class="tg" style="undefined;table-layout: fixed; width: 507px">

            <colgroup>
                <col style="width: 98px">
                <col style="width: 182px">
            </colgroup>

            <thead>
                <tr>
                    <th class="tg-qy72">ID</th>
                    <th class="tg-qy72">Type</th>
                </tr>
            </thead>

            <tbody>
<?php 

                foreach($json_workplaces as $item) {
                    
?>
                    <tr>
                        <td class="tg-hmyn"><?php echo $item['id']; ?></td>
                        <td class="tg-hmyn"><?php echo $item['type']; ?></td>
                    </tr>
<?php           
                }
?>
            </tbody>

        </table>

        <br/>
        
        <table class="tg" style="undefined;table-layout: fixed; width: 507px">

            <colgroup>
                <col style="width: 98px">
                <col style="width: 182px">
            </colgroup>

            <thead>
                <tr>
                    <th class="tg-qy72">ID</th>
                    <th class="tg-qy72">Type</th>
                </tr>
            </thead>

            <tbody>
<?php 

                foreach($json_payment_types as $item) {
                    
?>
                    <tr>
                        <td class="tg-hmyn"><?php echo $item['id']; ?></td>
                        <td class="tg-hmyn"><?php echo $item['type']; ?></td>
                    </tr>
<?php           
                }
?>
            </tbody>

        </table>


    </body>
</html>
<?php

  if ( empty(session_id()) ){
    session_start();
  } 

  require_once($_SERVER['DOCUMENT_ROOT'] . "/databases/access.php");

  //print_r($_SERVER);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/head.php"); ?>
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/header.php"); ?>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/aside.php"); ?>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Echauffements</h3>

        <div class="row mt">
          
          <div class="col-lg-12">
            <div class="form-panel">
            <form action="add.php" method="POST" class="form-horizontal style-form">
                
              <div class="form-group ">
                  <label class="control-label col-md-2">Élève</label>
                  <div class="col-md-3 col-xs-11">

<?php
                  if( $_SESSION['user-type-en'] == "student" ){
?>
                    <input disabled required class="form-control form-control-inline input-medium" name="student" id="student" size="16" type="text" value="<?php echo $_SESSION['user-informations']["givenname"]; ?> <?php echo $_SESSION['user-informations']["surname"]; ?> (<?php echo $_SESSION['user-informations']["title"]; ?>)" />
<?php
                  }else{
?>

                    <select class="form-control" required name="student" id="student" >

<?php 

                      foreach($json_students as $item) {

                        $itemChecked = "";

                        if( $item["default"] ){
                          $itemChecked = "checked";
                        }

?>
                        <option value="<?php echo $item["id"]; ?>" required ><?php echo $item["givenname"]; ?> <?php echo $item["surname"]; ?> (<?php echo $item["title"];?>)</option>
<?php           
                      }
?>
                    </select>
<?php
                  }
?>
                  </div>
              </div>

              <div class="form-group">

                <label class="control-label col-md-2">Exercices</label>

                <div class="col-md-3 col-xs-11">

<?php 
                foreach($json_exercises as $item) {

                  if( $item['types-of-exercise-id'] == 1 ){
?>

                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="exercises[]" id="exercise_<?php echo $item['id'];?>" value="<?php echo $item['id'];?>"> <?php echo $item['exercise-name'];?>
                      </label>
                    </div>
<?php           
                  }
                }
?>
                </div>
              </div>

              <div class="form-group">
                
                <label class="control-label col-md-2">Lieu</label>
                <div class="col-md-3 col-xs-11">
  <?php 

              foreach($json_workplaces as $item) {

                $itemChecked = "";

                if( $item["default"] ){
                  $itemChecked = "checked";
                }
      
  ?>
                <div class="radio">
                  <label>
                    <input required type="radio" name="workplaces" id="workplaces_<?php echo $item["id"]; ?>" value="<?php echo $item["id"]; ?>" <?php echo $itemChecked; ?> >
                    <?php echo $item["type"]; ?>
                    </label>
                </div>
  <?php           
              }
  ?>
                </div>

              </div>
      
                <div class="form-group">
                    <label class="control-label col-md-2">Date de l'échauffement</label>
                    <div class="col-md-3 col-xs-11">
                      <input required class="form-control form-control-inline input-medium default-date-picker" name="exercise-date" id="exercise-date" size="16" type="text" value="<?php echo date("m-d-Y"); ?>" >
                    </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-2">Professeur</label>
                  <div class="col-md-3 col-xs-11">
<?php
                  if( $_SESSION['user-type-en'] == "teacher" ){
?>
                  <select class="form-control" required name="teacher" id="teacher" >
                    <option value="<?php echo $_SESSION['user-informations']["id"]; ?>" required ><?php echo $_SESSION['user-informations']["givenname"]; ?> <?php echo $_SESSION['user-informations']["surname"]; ?> (<?php echo $_SESSION['user-informations']["title"];?>)</option>
                  </select>
<?php
                  }else{
?>
                    <select class="form-control" required name="teacher" id="teacher" >
<?php 

                      foreach($json_teachers as $item) {

                        $itemChecked = "";

                        if( $item["default"] ){
                          $itemChecked = "checked";
                        }
?>
                        <option value="<?php echo $item["id"]; ?>" required ><?php echo $item["givenname"]; ?> <?php echo $item["surname"]; ?> (<?php echo $item["title"];?>)</option>
<?php           
                      }
?>
                    </select>
<?php
                  }
?>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit">Ajout</button>
                  </div>
                </div>
                
              </form>
            </div>
            <!-- /form-panel -->
          </div>

        </div>

<?php

    //region PAYMENT TYPES

        // Read the JSON file
        $json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/databases/activities.json");
        
        // Check if the file was read successfully
        if ($json === false) {
            die('Error reading the JSON file');
        }

        // Decode the JSON file
        $json_activities = json_decode($json, true); 

        // Check if the JSON was decoded successfully
        if ($json_activities === null) {
            die('Error decoding the JSON file');
        }

    //endregion PAYMENT TYPES

?>
        
        <div class="row mt">
          
          <div class="col-lg-12">
            <!-- page start-->
            <div class="content-panel">
              <div class="adv-table">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Exercice</th>
                      <th>Lieu</th>
                      <th>Professeur</th>
                      <th>Élève</th>
                      <th>Commentaires</th>
                    </tr>
                  </thead>
                  <tbody>
  <?php 
                  foreach($json_activities as $item) {
                    
                    $workplaces = array_column($json_workplaces, 'id');
                    $teachers = array_column($json_teachers, 'id');
                    $students = array_column($json_students, 'id');
                    $exercises = array_column($json_exercises, 'id');

                    $found_workplace = array_search(strtolower($item['workplace']), array_map('strtolower',$workplaces));

                    $found_teacher = array_search(strtolower($item['teacher']), array_map('strtolower',$teachers));

                    $found_student = array_search(strtolower($item['student']), array_map('strtolower',$students));

                    $found_exercise = array_search(strtolower($item['exercise']), array_map('strtolower',$exercises));
  ?>
                    <tr>
                        <td><?php echo $item["exercise-date"]; ?></td>
                        <td><?php echo $json_exercises[$found_exercise]["exercise-name"]; ?></td>
                        <td><?php echo $json_workplaces[$found_workplace]["type"]; ?></td>
                        <td><?php echo $json_teachers[$found_teacher]["givenname"]; ?> <?php echo $json_teachers[$found_teacher]["surname"]; ?></td>
                        <td><?php echo $json_students[$found_student]["givenname"]; ?> <?php echo $json_students[$found_student]["surname"]; ?></td>
                        <td><?php echo $item["comment"]; ?></td>
                    </tr>
  <?php           
                  }
  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- page end-->
        </div>

        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . "/footer.php"); ?>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }
    
    $(document).ready(function() {

   
      // Insert a 'details' column to the table

      /*
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";
      
      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });
      */

      // Initialse DataTables, with no sorting on the 'details' column
      
      var oTable = $('#hidden-table-info').dataTable({
        /*
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        */
        "aaSorting": [
          [1, 'asc']
        ]
      });

      // Add event listener for opening and closing details, Note that the indicator for showing which row is open is not controlled by DataTables,rather it is done here

      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          // This row is already open - close it
          this.src = "lib/advanced-datatable/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          // Open this row
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
    
  </script>


  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="lib/advanced-form-components.js"></script>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }
    
    $(document).ready(function() {
   
      // Insert a 'details' column to the table

      /*
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";
      
      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });
      */

      // Initialse DataTables, with no sorting on the 'details' column
      
      var oTable = $('#hidden-table-info').dataTable({
        /*
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        */
        "aaSorting": [
          [1, 'asc']
        ]
      });

      // Add event listener for opening and closing details, Note that the indicator for showing which row is open is not controlled by DataTables,rather it is done here

      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          // This row is already open - close it
          this.src = "lib/advanced-datatable/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          // Open this row
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
    
  </script>

</body>

</html>

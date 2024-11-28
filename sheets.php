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
        <h3><i class="fa fa-angle-right"></i> Fiches</h3>

        <div class="row mt">
          
          <div class="col-lg-12">

            <div class="form-panel">

              <form action="process_form.php" method="POST" class="form-horizontal style-form">

                <input type="hidden" value="warm-up" id="form-type" name="form-type" />
                  
                <div class="form-group ">
                    <label class="control-label col-md-2">Cours</label>
                    <div class="col-md-6 col-xs-11">
                      <select class="form-control" required name="lesson" id="lesson" >
  <?php 
                        foreach($json_lessons as $item) {

                          $workplaces = array_column($json_workplaces, 'id');
                          $teachers = array_column($json_teachers, 'id');
                          $students = array_column($json_students, 'id');
                          $lesson_types = array_column($json_lessons_types, 'id');
                          $lesson_durations = array_column($json_lessons_durations, 'id');
      
                          $found_workplace = array_search(strtolower($item['workplace']), array_map('strtolower',$workplaces));
                          $found_teacher = array_search(strtolower($item['teacher']), array_map('strtolower',$teachers));
                          $found_student = array_search(strtolower($item['student']), array_map('strtolower',$students));
                          $found_lesson_type = array_search(strtolower($item['lesson-type']), array_map('strtolower',$lesson_types));
                          $found_lesson_duration = array_search(strtolower($item['duration']), array_map('strtolower',$lesson_durations));

  ?>
                          <option value="<?php echo $item["id"]; ?>" required ><?php echo $item["lesson-date"]; ?> - <?php echo $json_workplaces[$found_workplace]["type"]; ?> - <?php echo $json_teachers[$found_teacher]["givenname"]; ?> <?php echo $json_teachers[$found_teacher]["surname"]; ?> (<?php echo $json_teachers[$found_teacher]["title"]; ?>) - <?php echo $json_students[$found_student]["givenname"];?> <?php echo $json_students[$found_student]["surname"];?> (<?php echo $json_students[$found_student]["title"];?>) - <?php echo $json_lessons_types[$found_lesson_type]["type"];?> - <?php echo $json_lessons_durations[$found_lesson_duration]["duration"];?></option>
  <?php           
                        }
  ?>
                      </select>
                    </div>
                </div>
                 
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn btn-theme" type="submit">Ajout</button>
                  </div>
                </div>
                
              </form>

            </div>

          </div>

        </div>
        
        <div class="row">
          
          <div class="col-lg-12">

            <div class="form-panel">

<?php 

              $item = $json_lessons[0];
  

              $workplaces = array_column($json_workplaces, 'id');
              $teachers = array_column($json_teachers, 'id');
              $students = array_column($json_students, 'id');
              $lesson_types = array_column($json_lessons_types, 'id');
              $lesson_durations = array_column($json_lessons_durations, 'id');

              $found_workplace = array_search(strtolower($item['workplace']), array_map('strtolower',$workplaces));
              $found_teacher = array_search(strtolower($item['teacher']), array_map('strtolower',$teachers));
              $found_student = array_search(strtolower($item['student']), array_map('strtolower',$students));
              $found_lesson_type = array_search(strtolower($item['lesson-type']), array_map('strtolower',$lesson_types));
              $found_lesson_duration = array_search(strtolower($item['duration']), array_map('strtolower',$lesson_durations));
                   
?>
              
            <p><strong>ID de la leçon :</strong> <?php echo $item["id"]; ?></p>
            <p><strong>Date de la leçon :</strong> <?php echo $item["lesson-date"]; ?></p>
            <p><strong>Lieu :</strong> <?php echo $json_workplaces[$found_workplace]["type"]; ?></p>
            <p><strong>Professeur :</strong> <?php echo $json_teachers[$found_teacher]["givenname"]; ?> <?php echo $json_teachers[$found_teacher]["surname"]; ?> (<?php echo $json_teachers[$found_teacher]["title"]; ?>)</p>
            <p><strong>Élève :</strong> <?php echo $json_students[$found_student]["givenname"];?> <?php echo $json_students[$found_student]["surname"];?> (<?php echo $json_students[$found_student]["title"];?>)</p>
            <p><strong>Type :</strong> <?php echo $json_lessons_types[$found_lesson_type]["type"]; ?></p>
            <p><strong>Durée :</strong> <?php echo $json_lessons_durations[$found_lesson_duration]["duration"]; ?></p>

            </div>

          </div>
   
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

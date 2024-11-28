<aside>
    <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
        <p class="centered"><a href="profile.html"><img src="<?php echo $_SESSION['user-informations']['avatar']; ?>" class="img-circle" width="80"></a></p>
        <h5 class="centered"><?php echo $_SESSION['user-informations']['givenname']; ?> <?php echo $_SESSION['user-informations']['surname']; ?><br/> <?php echo $_SESSION['user-type']; ?></h5>
        <li class="mt">
            <a class="" href="index.php">
                <i class="fa fa-dashboard"></i>
                <span>Tableau de bord</span>
            </a>
        </li>
        <li class="sub-menu hide disabled_theo">
        <a href="javascript:;">
            <i class="fa fa-desktop"></i>
            <span>UI Elements</span>
            </a>
        <ul class="sub">
            <li><a href="general.html">General</a></li>
            <li><a href="buttons.html">Buttons</a></li>
            <li><a href="panels.html">Panels</a></li>
            <li><a href="font_awesome.html">Font Awesome</a></li>
        </ul>
        </li>
        <li class="">
            <a class="" href="types_of_exercise.php">
                <i class="fa fa-cogs"></i>
                <span>Config - Types d'exercice</span>
            </a>
        </li>
        <li class="">
            <a class="" href="lessons_types.php">
                <i class="fa fa-cogs"></i>
                <span>Config - Types de leçons</span>
            </a>
        </li>
        <li class="">
            <a class="" href="payment_types.php">
                <i class="fa fa-cogs"></i>
                <span>Config - Types de paiement</span>
            </a>
        </li>
        <li class="">
            <a class="" href="workplaces.php">
                <i class="fa fa-cogs"></i>
                <span>Config - Lieux des cours</span>
            </a>
        </li>
        <li class="">
            <a class="" href="lessons.php">
                <i class="fa fa-th"></i>
                <span>Cours - Cours</span>
            </a>
        </li>
        <li class="">
            <a class="" href="warm_ups.php">
                <i class="fa fa-th"></i>
                <span>Cours - Echauffements</span>
            </a>
        </li>
        <li class="">
            <a class="" href="improvisations.php">
                <i class="fa fa-th"></i>
                <span>Cours - Improvisations</span>
            </a>
        </li>
        <li class="">
            <a class="" href="exercises.php">
                <i class="fa fa-th"></i>
                <span>Cours - Exercices</span>
            </a>
        </li>
        <li class="">
            <a class="" href="sheets.php">
                <i class="fa fa-th"></i>
                <span>Cours - Fiches de cours</span>
            </a>
        </li>
        <li class="">
            <a class="" href="sheets_songs.php">
                <i class="fa fa-th"></i>
                <span>Cours - Fiches de chansons</span>
            </a>
        </li>
        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-cogs"></i>
                <span>Configuration (DEV EC)</span>
            </a>
            <ul class="sub">
                <li><a href="types_of_exercise.php">Types d'exercice</a></li>
                <li><a href="lessons_types.php">Types de leçons</a></li>
                <li><a href="payment_types.php">Types de paiement</a></li>
                <li><a href="workplaces.php">Lieux des cours</a></li>
            </ul>
        </li>        
        <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-th"></i>
                <span>Cours (DEV EC)</span>
            </a>
            <ul class="sub">
                <li><a href="lessons.php">Cours</a></li>
                <li><a href="warm_ups.php">Echauffements</a></li>
                <li><a href="improvisations.php">Improvisations</a></li>
                <li><a href="exercises.php">Exercices</a></li>
                <li><a href="sheets.php">Fiches</a></li>
            </ul>
        </li>
        <li class="sub-menu hide disabled_theo">
            <a href="javascript:;">
                <i class="fa fa-cogs"></i>
                <span>Components</span>
            </a>
            <ul class="sub">
                <li><a href="grids.html">Grids</a></li>
                <li><a href="calendar.html">Calendar</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="todo_list.html">Todo List</a></li>
                <li><a href="dropzone.html">Dropzone File Upload</a></li>
                <li><a href="inline_editor.html">Inline Editor</a></li>
                <li><a href="file_upload.html">Multiple File Upload</a></li>
            </ul>
        </li>
        <li class="sub-menu hide disabled_theo">
            <a href="javascript:;">
                <i class="fa fa-book"></i>
                <span>Extra Pages</span>
            </a>
            <ul class="sub">
                <li><a href="blank.html">Blank Page</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="lock_screen.html">Lock Screen</a></li>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="invoice.html">Invoice</a></li>
                <li><a href="pricing_table.html">Pricing Table</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="404.html">404 Error</a></li>
                <li><a href="500.html">500 Error</a></li>
            </ul>
        </li>
        <li class="sub-menu hide disabled_theo">
            <a href="javascript:;">
                <i class="fa fa-tasks"></i>
                <span>Forms</span>
            </a>
            <ul class="sub">
                <li><a href="form_component.html">Form Components</a></li>
                <li><a href="advanced_form_components.html">Advanced Components</a></li>
                <li><a href="form_validation.html">Form Validation</a></li>
                <li><a href="contactform.html">Contact Form</a></li>
            </ul>
        </li>
        <li class="sub-menu hide disabled_theo">
        <a href="javascript:;">
            <i class="fa fa-th"></i>
            <span>Data Tables</span>
            </a>
        <ul class="sub">
            <li><a href="basic_table.html">Basic Table</a></li>
            <li><a href="responsive_table.html">Responsive Table</a></li>
            <li><a href="advanced_table.html">Advanced Table</a></li>
        </ul>
        </li>
        <li class="hide disabled_theo">
            <a href="inbox.html">
                <i class="fa fa-envelope"></i>
                <span>Mail </span>
                <span class="label label-theme pull-right mail-info">2</span>
            </a>
        </li>
        <li class="sub-menu hide disabled_theo">
        <a href="javascript:;">
            <i class=" fa fa-bar-chart-o"></i>
            <span>Charts</span>
            </a>
        <ul class="sub">
            <li><a href="morris.html">Morris</a></li>
            <li><a href="chartjs.html">Chartjs</a></li>
            <li><a href="flot_chart.html">Flot Charts</a></li>
            <li><a href="xchart.html">xChart</a></li>
        </ul>
        </li>
        <li class="sub-menu hide disabled_theo">
        <a href="javascript:;">
            <i class="fa fa-comments-o"></i>
            <span>Chat Room</span>
            </a>
        <ul class="sub">
            <li><a href="lobby.html">Lobby</a></li>
            <li><a href="chat_room.html"> Chat Room</a></li>
        </ul>
        </li>
        <li class="hide disabled_theo">
            <a href="google_maps.html">
                <i class="fa fa-map-marker"></i>
                <span>Google Maps </span>
            </a>
        </li>
    </ul>
    <!-- sidebar menu end-->
    </div>
</aside>
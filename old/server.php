<?php

  if ( empty(session_id()) ){
    session_start();
  } 

  print_r($_SERVER);

?>
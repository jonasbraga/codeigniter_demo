<?php
date_default_timezone_set('America/Sao_Paulo');
if(!function_exists('now_date_mysql')){

  function now_date_mysql(){
    return date('Y-m-d H:i:s');
  }
} 

if(!function_exists('format_date')){

  function format_date($date, $format = 'd/m/Y'){
    return date($format, strtotime($date));
  }
}



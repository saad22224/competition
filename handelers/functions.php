<?php

function redirect($path){
    return header("location:$path");
}

function emptyInput($input) {
  if(empty($input)){
    return true;
  }
  return false;
}


function validateEmail($email){
  if(filter_var($email , FILTER_VALIDATE_EMAIL)){
    return true;
  }
  return false;
}
?>
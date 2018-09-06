<?php

function processRequest() {
  route();

  $controller = c(path(1));
  if(!$controller) {
    redirect();
  }

  $result = $controller->handleRequest();

  echo $result;
}

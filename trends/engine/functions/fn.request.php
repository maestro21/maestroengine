<?php

function processRequest() {
  route();

  $controller = c(path(0));
  $method = path(1) . 'Action';

  if(!$controller) return;

  $result = '';
  if(method_exists($controller,$method)) {
      $result = $controller->$method();
  }

  echo $result;
}



function redirect($to = null, $time = 0, $relative = false){
    if(!empty($to)) {
      $to = str_replace('#','', $to); if($relative) $to = BASE_URL  . '/' . $to;
    } else {
      $to = BASE_URL;
    }
    echo "<html><body><script>setTimeout(\"location.href='$to'\", {$time}000);</script></body></html>";
    if($time==0) die();
}

function goBack(){
    redirect(server('HTTP_REFERER'));
}


function server($name) {
  global $_SERVER;
  return $_SERVER[$name] ?? null;
}

/**
 * return request method
 */
function method() {
  return server('REQUEST_METHOD');
}

function get($key, $default = NULL) {
    global $_GET;
    if(isset($_GET[$key])) return $_GET[$key];
    return $default;
}

function post($key = null, $default = NULL) {
    global $_POST;
    if($key == null) return $_POST;
    if(isset($_POST[$key])) return $_POST[$key];
    return $default;
}
function request($key, $default = NULL) {
    global $_REQUEST;
    if(isset($_REQUEST[$key])) return $_REQUEST[$key];
    return $default;
}

function session($key = null, $value = null) {
    global $_SESSION;
    if(!$key) return $_SESSION;
    if($value) {
        $_SESSION[$key] = $value;
    }
    return $_SESSION[$key] ?? null;
}


function api() {
  return (path(0) == 'api');
}

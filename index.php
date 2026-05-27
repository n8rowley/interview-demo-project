<?php

$routes = [
  '/' => 'views/form.view.html',
  '/submit' => 'controllers/submit.php',
];

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

if (array_key_exists($path, $routes)) {
  require $routes[$path];
} else {
  require "views/404.html";
  http_response_code(404);
}

function dd($var) {
  echo "<pre>";
  var_dump($var);
  echo "</pre>";

  die();
}


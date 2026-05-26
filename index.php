<?php

$routes = [
  '/' => 'views/form.view.html',
  '/submit' => 'submit.php',
];

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

if (array_key_exists($path, $routes)) {
  require $routes[$path];
} else {
  require "views/404.html";
}

<?php

/**
 * Base Path
 * 
 * @param string $path
 * @return void
 */
function basePath($path = '') {
    return __DIR__ . '/' . $path;
}

/**
 * Load a view 
 * 
 * @param string $name
 * @return void
 */
function loadView($name, $data = []) {
    $fullPath = basePath('views/' . $name . '.view.php');
    // $fullPath = $path . $ext;

   if(!file_exists($fullPath)) {
     die('View Not found ' . $fullPath);
   } else {
    extract($data);
    require $fullPath;
   }
}

/**
 * Load a partial
 * 
 * @param string name
 * @return void
 */
function loadPartial($name = '') {
    $path = basePath('views/partials/' . $name . '.php');

    require $path;
}

/**
 * Inspact value 
 * 
 * @param mixed $value
 */
function inspect($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

}

/**
 * Inspact AND die
 * 
 * @param mixed $value
 */
function inspectAndDie($value) {
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}
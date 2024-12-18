<?php

/**
 * Base Path
 * 
 * @param string $path
 * @return string
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
    $fullPath = basePath('App/views/' . $name . '.view.php');
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
function loadPartial($name = '', $data = []) {
    $path = basePath('App/views/partials/' . $name . '.php');
    extract($data);
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

/**
 * Formate date 
 *
 * @param string $date
 * @return date
 */
function formateDate($date) {
    $newDate = new DateTime($date);

    $formatedDate = $newDate->format('d M, Y');

    return $formatedDate;
}

/**
 * Sanitize data 
 * 
 * @param string $dirty
 * @return string
 */
function sanitize($dirty) {
    $dirty = trim($dirty);

    return filter_var($dirty, FILTER_SANITIZE_SPECIAL_CHARS);
}


/**
 * Redirect 
 * 
 * @param string $url
 * @return void
 */
function redirect($url) {
    header("Location: {$url}");
    exit;
}

/**
 * Shorten a string of content 
 * 
 * @param string $string
 * @return string
 */
function shortenString($string, $lastLength = 239) {
    $str_len = strlen($string);

    if($str_len >= 240) {
        return substr($string, 0, $lastLength) . "...";
    }

    return $string;
}


/**
 * Load post image 
 * 
 * @param string $image_name
 * @return void
 */
function loadPostImage($image_name) {
    $path = '/public/upload/featuredImage/' . $image_name;
    // $path = basePath('public/upload/featuredImage/' . $image_name);

    if(!file_exists($path)) {
        die('image Not found ' . $path);
    } else {
        echo '<img src="'. $path .'" alt="">';
    }
   
}

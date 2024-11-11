<?php

namespace App\controllers;


class ErrorController {

    public static function notFound($message = "Sorry, we can’t find the page you’re looking for. ") {
        http_response_code(404);
        loadView('error', [
            'status' => '404',
            'message' => $message
        ]);
    }
}
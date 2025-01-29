<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Middleware\Responses\JsonResponseMiddleware;
use App\Http\Middleware\Validations\IpBlacklistMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([
    JsonResponseMiddleware::class, // Another option is to set middleware in app.php, but I'll set it here, for sake of simplicity.
    IpBlacklistMiddleware::class
])->group(function () {
    Route::post('/register', [RegisterController::class, 'register']);
});

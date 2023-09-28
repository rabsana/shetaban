<?php
namespace Routes;

use App\Http\Controllers\Api\V1\Transactions\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/v1/transactions', [StoreController::class, 'store']);



<?php

use App\Http\Controllers\MemberController;
 use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PublisherController;
 use App\Http\Controllers\BookController;
 use App\Http\Controllers\LoanController;

 Route::apiResource('members', MemberController::class);
 Route::apiResource('authors', AuthorController::class);
 Route::apiResource('publishers', PublisherController::class);
 Route::apiResource('books', BookController::class);
 Route::apiResource('loans', LoanController::class);
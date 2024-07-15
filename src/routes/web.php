<?php

use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;
use App\Models\Catalog;

Route::get('/', function () {
    return redirect('/tree');
});

Route::get('/tree', function () {
    $catalogs = Catalog::tree();
    return view('catalog-list', ['catalogs' => $catalogs]);
})->name('tree');


Route::get('/table', function () {
    $catalogs = Catalog::table();
    return view('table', ['catalogs' => $catalogs]);
})->name('table');

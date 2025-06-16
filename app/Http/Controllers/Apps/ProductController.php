<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;

class ProductController extends Controller
{
    //

    public static function middleware(): array {
        return [
            new Middleware(['permission:products.index'], ['index']),
            new Middleware(['permission:products.create'], only: ['create', 'store']),
            new Middleware(['permission:products.edit'], only: ['edit', 'update']),
            new Middleware(['permission:products.delete'], only: ['destroy']),
        ];
    }
    public function index () {

    }
}

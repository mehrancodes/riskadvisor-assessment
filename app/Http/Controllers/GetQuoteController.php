<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;

class GetQuoteController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();

        return Inertia::render('GetQuote/Index', compact('products'));
    }
}

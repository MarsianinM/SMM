<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(): View
    {
        return view('prices.index');
    }
}

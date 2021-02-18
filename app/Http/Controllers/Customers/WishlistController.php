<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(): View
    {
        return view('wishlists.index');
    }
}

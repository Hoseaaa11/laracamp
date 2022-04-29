<?php

namespace App\Http\Controllers;
use App\Models\Checkout;
use Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $checkouts = Checkout::with('Camp')->whereUserId(Auth::id())->get();    
        return view('user.dashboard', [
        'checkouts' => $checkouts
        ]);
}
}
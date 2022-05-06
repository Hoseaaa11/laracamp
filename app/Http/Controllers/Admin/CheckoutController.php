<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    public function update(request $request, Checkout $checkout)
    {
        $checkout->is_paid = true;
        $checkout->save();
        $request->session()->flash('success', "Checkout with ID {$checkout->id} has been updated!");
        return redirect(route('admin.dashboard'));    
    }
}

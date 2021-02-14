<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DigikalaOrderController extends Controller
{
    public function AskProduct() {
        return view('Digikala.Ask');
    }
}

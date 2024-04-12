<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();


        $user = Auth::user();

        return view('home.index', compact('services', 'user'));
    }
}

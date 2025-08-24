<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use Illuminate\Http\Request;

class RumahController extends Controller
{
   public function index() {
      $rumah = Rumah::with('images', 'tags')->latest()->take(3)->get();
      return view('rumah.home', compact('rumah'));
   }
}

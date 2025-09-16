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

   public function shop() {
      $rumah = Rumah::with('images', 'tags')->latest()->get();
      return view('rumah.shop', compact('rumah'));
   }

   public function show($id) {
      $rumahh = Rumah::find($id);
      return view('rumah.shop', ['rumahh'=> $rumahh ]); 
   }

   public function about() {
      return view('rumah.about');
   }

   public function contact() {
      return view('rumah.contact');
   }
}

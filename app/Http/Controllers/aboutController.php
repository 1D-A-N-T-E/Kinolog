<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\softDeletes;
class aboutController extends Controller
{
    public function index(){
      
          
        return view('about');
        
    }



}
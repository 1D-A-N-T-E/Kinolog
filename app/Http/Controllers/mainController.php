<?php

namespace App\Http\Controllers;
use App\Models\UserComment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\softDeletes;
class mainController extends Controller
{
    // HomeController.php vai jebkurš cits kontrolieris, kas atbild par galveno lapu
public function index()
{
    $comments = \App\Models\UserComment::with('user')->latest()->paginate(10);
    return view('main', compact('comments'));
}




}
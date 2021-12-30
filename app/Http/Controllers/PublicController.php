<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function index() {
        $articles = Article::where('published', true)->get();
        
        return view('welcome', compact('articles'));

    }
}

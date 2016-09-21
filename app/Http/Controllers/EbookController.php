<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EbookController extends Controller
{
    public function index(){
    	return view('ebook.index');

    }

    public function create(){
    	return view('ebook.create');
    }
}

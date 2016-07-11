<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function getAdd(){
        return view('admin.category.create');
    }
    public function postAdd(CategoryRequest $request){
        print_r($request->catname);
    }

}

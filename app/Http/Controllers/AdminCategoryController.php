<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 

class AdminCategoryController extends Controller
{
    public $name;
    public $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required'
        ]);
    }

    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', ['categories' => $categories]);
    }
    public function add()
    {
        return view('admin.categories.add');
    }
}


<?php
namespace App\Http\Controllers\Category;

use App\Helpers\CategoryTreeTraverser;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class CategoryController
{
    private $categoryTreeTraverser;

    public function __construct(CategoryTreeTraverser $categoryTreeTraverser)
    {
        $this->categoryTreeTraverser = $categoryTreeTraverser;
    }

    public function recursive()
    {
        $categoryCollection = Category::all()->where('parent_category_id', null);
        $categoriesHtml = $this->categoryTreeTraverser->getHtmlRecursive($categoryCollection);

        return view('categories.list', ['categoriesHtml' => $categoriesHtml]);
    }
    
    public function iterative()
    {
        $categoryCollection = Category::all()->where('parent_category_id', null)->reverse();
        $categoriesHtml = $this->categoryTreeTraverser->getHtmlIterative($categoryCollection);

        return view('categories.list', ['categoriesHtml' => $categoriesHtml]);
    }

    public function create()
    {
        $categoryList = Category::all()->pluck('name', 'id');

        return view('categories.create', ['categoryList' => $categoryList->toArray()]);
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category->name = $request->input('name');
        $category->parent_category_id = $request->input('parent_category_id', null);

        $category->saveOrFail();

        return redirect()->route('categories.list.iterative');
    }
}

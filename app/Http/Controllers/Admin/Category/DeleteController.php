<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class  DeleteController extends Controller
{
    public function __invoke(DeleteController $deleteController ,Category $category)
    {

        $category->delete();

        return redirect()->route('admin.categories.index');

    }
}

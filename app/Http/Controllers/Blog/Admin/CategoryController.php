<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Http\Requests\BlogCategoryCreateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;

class CategoryController extends BaseController
{
    public function index(Request $request)
    {
        $frd = $request->all();
        $blogCategories = BlogCategory::paginate(15);
        return view('blog.admin.categories.index', compact('blogCategories', 'frd'));
    }

    public function create()
    {
        $categoryList = BlogCategory::pluck('title', 'id')->toArray();

        return view('blog.admin.categories.create', compact('categoryList'));
    }

    public function store(BlogCategoryCreateRequest $request)
    {

        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = str_slug($data(['title']));
        }

        // Создаст объект и добавит в БД
        $blogCategory = (new BlogCategory())->create($data);

        if ($blogCategory) {
            $response = redirect()
                ->route('blog.admin.categories.edit', compact('blogCategory'))
                ->with(['success' => 'Успешно сохранено']);
        } else {
            $response = back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

        return $response;
    }

    public function edit(BlogCategory $blogCategory)
    {
        $categoryList = BlogCategory::pluck('title', 'id')->toArray();

        return view('blog.admin.categories.edit',
            compact('blogCategory', 'categoryList'));
    }

    public function update(BlogCategoryUpdateRequest $request, BlogCategory $blogCategory)
    {
        $data = $request->all();
        if (empty($data['slug'])) {
            $data['slug'] = str_slug($data(['title']));
        }

        $result = $blogCategory->update($data);

        if ($result) {
            $response = redirect()
                ->route('blog.admin.categories.edit', $blogCategory)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            $response = back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }

        return $response;
    }
}

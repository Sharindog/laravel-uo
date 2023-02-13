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
    public function index()
    {
        $paginator = BlogCategory::paginate(15);
        return view('blog.admin.categories.index', compact('paginator'));
    }

    public function create()
    {
        $item = new BlogCategory();
        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = str_slug($data(['title']));
        }

        // Создаст объект и добавит в БД
        $item = (new BlogCategory())->create($data);

        if ($item) {
            return redirect()
                ->route('blog.admin.categories.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    public function edit($id, BlogCategoryRepository $categoryRepository)
    {
        $item = $categoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $categoryList = $categoryRepository->getForComboBox();

        return view('blog.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $item = BlogCategory::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        if (empty($data['slug'])) {
            $data['slug'] = str_slug($data(['title']));
        }

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Dto\CategoryDto;
use App\Http\Repositories\CategoryRepository;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function indexTree()
    {
        $categories = $this->categoryRepository->getAllParent();
        return view('admin.categories.indexTree', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $categoryDto = new CategoryDto();
        $categoryDto->title = $request->title;
        $categoryDto->parentCategoryIdUuid = $request->parent_category;
        $this->categoryRepository->addCategory($categoryDto);
        return redirect(route('admin.categories.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $idUuid
     * @return Application|Factory|View
     */
    public function edit(string $idUuid)
    {
        $categories = $this->categoryRepository->getAll();
        $category = $this->categoryRepository->getById($idUuid);
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param string $idUuid
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, string $idUuid)
    {
        $category = $this->categoryRepository->getById($idUuid);
        $categoryDto = new CategoryDto();
        $categoryDto->title = $request->title;
        $categoryDto->parentCategoryIdUuid = $request->parent_category;
        $this->categoryRepository->updateCategory($categoryDto, $category);
        return redirect(route('admin.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $idUuid
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(string $idUuid)
    {
        return DB::transaction(function () use ($idUuid) {
            $childCategories = $this->categoryRepository->getAllChildByParentId($idUuid);
            foreach ($childCategories as $category) {
                $categoryDto = new CategoryDto();
                $categoryDto->title = $category->title;
                $categoryDto->parentCategoryIdUuid = null;
                $this->categoryRepository->updateCategory($categoryDto, $category);
            }
            $this->categoryRepository->deleteCategory($idUuid);
            return redirect(route('admin.categories.index'));
        });
    }
}

<?php

namespace App\Http\Repositories;

use App\Http\Dto\CategoryDto;
use App\Models\Category;

class CategoryRepositoryImpl extends BaseRepository implements CategoryRepository
{

    public function getAll()
    {
        return Category::query()->with('parentCategory')->get();
    }

    public function getAllParent()
    {
        return Category::query()
            ->with('subCategories')
            ->whereNull(Category::PARENT_CATEGORY_ID_UUID)
            ->get();
    }

    public function getAllChildByParentId(string $idUuid)
    {
        return Category::query()
            ->where(Category::PARENT_CATEGORY_ID_UUID, $idUuid)
            ->get();
    }

    public function getById(string $idUuid)
    {
        return Category::query()
            ->findOrFail($idUuid);
    }

    public function addCategory(CategoryDto $categoryDto): Category
    {
        $category = new Category();
        $category->title = $categoryDto->title;
        $category->parent_category_id_uuid = $categoryDto->parentCategoryIdUuid;
        $category->save();
        return $category;
    }

    public function updateCategory(CategoryDto $categoryDto, Category $category): Category
    {
        $category->title = $categoryDto->title;
        $category->parent_category_id_uuid = $categoryDto->parentCategoryIdUuid;
        $category->save();
        return $category;
    }

    public function deleteCategory(string $idUuid): int
    {
        return Category::destroy($idUuid);
    }
}

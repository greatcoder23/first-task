<?php

namespace App\Http\Repositories;

use App\Http\Dto\CategoryDto;
use App\Models\Category;

interface CategoryRepository
{
    public function getAll();

    public function getAllParent();

    public function getAllChildByParentId(string $idUuid);

    public function getById(string $idUuid);

    public function addCategory(CategoryDto $categoryDto);

    public function updateCategory(CategoryDto $categoryDto, Category $category);

    public function deleteCategory(string $idUuid);
}

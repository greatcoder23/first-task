<?php

namespace App\Http\Repositories;

use App\Http\Dto\CategoryDto;

interface CategoryRepository
{
    public function getAll();

    public function getAllParent();

    public function addCategory(CategoryDto $categoryDto);
}

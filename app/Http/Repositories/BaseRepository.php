<?php

namespace App\Http\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class BaseRepository
{
    public function paginate(Builder $query, $pageSize = 15): LengthAwarePaginator
    {
        return $query->paginate($pageSize);
    }
}

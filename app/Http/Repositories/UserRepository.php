<?php

namespace App\Http\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function paginated(): LengthAwarePaginator;
}

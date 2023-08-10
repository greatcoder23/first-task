<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepositoryImpl extends BaseRepository implements UserRepository
{
    /**
     * @return LengthAwarePaginator
     */
    public function paginated(): LengthAwarePaginator
    {
        return $this->paginate(User::query());
    }
}

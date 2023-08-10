<?php

namespace Database\Seeders;

use App\Models\AppEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppEnumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(AppEnum::TABLE_NAME)->insert([
            [
                AppEnum::ENUM_TYPE => 'RoleType',
                AppEnum::ENUM_LABEL => 'Admin',
                AppEnum::CREATED_AT => Carbon::now(),
                AppEnum::UPDATED_AT => Carbon::now(),
            ],
            [
                AppEnum::ENUM_TYPE => 'RoleType',
                AppEnum::ENUM_LABEL => 'User',
                AppEnum::CREATED_AT => Carbon::now(),
                AppEnum::UPDATED_AT => Carbon::now(),
            ]
        ]);
    }
}

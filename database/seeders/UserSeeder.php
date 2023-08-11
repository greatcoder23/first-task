<?php

namespace Database\Seeders;

use App\Http\Common\AppEnumConstant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(User::TABLE_NAME)->insert([
            [
                User::ID => getUuid(User::class),
                User::FIRST_NAME => 'Marley',
                User::LAST_NAME => 'Erdman',
                User::EMAIL => 'admin@example.com',
                User::ROLE_TYPE => getAppEnumId(AppEnumConstant::ROLE_TYPE, AppEnumConstant::ROLE_TYPE_ADMIN),
                User::EMAIL_VERIFIED_AT => now(),
                User::PASSWORD => bcrypt('admin@123'),
                User::REMEMBER_TOKEN => Str::random(10),
                User::CREATED_AT => now(),
                User::UPDATED_AT => now(),
            ],
            [
                User::ID => getUuid(User::class),
                User::FIRST_NAME => 'Ricky',
                User::LAST_NAME => 'Steuber',
                User::EMAIL => 'user@example.com',
                User::ROLE_TYPE => getAppEnumId(AppEnumConstant::ROLE_TYPE, AppEnumConstant::ROLE_TYPE_USER),
                User::EMAIL_VERIFIED_AT => now(),
                User::PASSWORD => bcrypt('user@123'),
                User::REMEMBER_TOKEN => Str::random(10),
                User::CREATED_AT => now(),
                User::UPDATED_AT => now(),
            ]
        ]);
    }
}

<?php

namespace Database\Factories;

use App\Http\Common\AppEnumConstant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            User::FIRST_NAME => $this->faker->firstName(),
            User::LAST_NAME => $this->faker->lastName(),
            User::EMAIL => $this->faker->unique()->safeEmail(),
            User::ROLE_TYPE => getAppEnumId(AppEnumConstant::ROLE_TYPE, AppEnumConstant::ROLE_TYPE_USER),
            User::EMAIL_VERIFIED_AT => now(),
            User::PASSWORD => bcrypt('password'),
            User::REMEMBER_TOKEN => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

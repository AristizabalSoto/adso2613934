<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * The current password being used by the factory.
     *
     * @var string|null
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['female', 'male']);

        $firstName = ($gender == 'male') ? $this->faker->firstNameMale() : $this->faker->firstNameFemale();

        // Generate a unique filename for the photo
        $photoName = Str::random(10) . '.jpg'; // Example: randomname.jpg

        // Generate and store the image in storage/app/public/images
        $this->faker->image(storage_path('app/public/images'), 200, 200, 'people', false, true, 'Faker');

        return [
            'document' => $this->faker->randomNumber(9, true),
            'fullname' => $firstName . ' ' . $this->faker->lastName(),
            'gender' => $gender,
            'birthdate' => $this->faker->dateTimeBetween('-50 years', '-20 years')->format('Y-m-d'),
            'photo' => 'images/' . $photoName,
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('12345'),
            'remember_token' => Str::random(10),
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




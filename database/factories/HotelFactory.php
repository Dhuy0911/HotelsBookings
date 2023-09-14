<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HotelFactory extends Factory
{
    protected $model = Hotel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->firstName . ' ' . $this->faker->lastName . ' Hotel';
        return [
            'name' => $name,
            'address' => $this->faker->address(),
            'main_image' => $this->faker->imageUrl(),
            'status' => rand(0, 1),
            'content' => $this->faker->text(),
            'time_open' => $this->faker->time(),
            'time_closed' => $this->faker->time(),
            'hotline' => $this->faker->phoneNumber(),
            'user_id' => rand(1, 20),
            'location_id' => rand(1, 6),
            'place_type_id' => rand(1, 5),
        ];
    }
}

<?php

namespace Database\Factories;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name,
            'adresse' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'birthday' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'ville_id' => $this->faker->randomElement(Ville::pluck('id')) //Generates a city from factory and extract
        ];
    }
}

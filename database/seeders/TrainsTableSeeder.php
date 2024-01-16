<?php

namespace Database\Seeders;

use App\Models\Train;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Generator as Faker;

class TrainsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(Faker $faker)
	{
		for ($i = 0; $i < 50; $i++) {
			$train = new Train();
			$train->azienda = $faker->company();
			$train->stazione_partenza = $faker->city();
			$train->stazione_arrivo = $faker->city();
			$train->data_partenza = $faker->dateTimeBetween('now', '+5 days')->format('Y-m-d');
			$start = $faker->dateTimeBetween(now(), '+7 days');
			$train->orario_partenza = $start;
			$end = $faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s').' +5 hours');
			$train->orario_arrivo = $end;
			$train->codice_treno = $faker->numerify('######');
			$train->numero_carrozze = $faker->randomNumber(2, false);
			$train->in_orario = $faker->boolean();
			$train->cancellato = $faker->boolean();
			$train->save();
		}
	}
}

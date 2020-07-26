<?php

use App\Models\Problem;
use Illuminate\Database\Seeder;

class ProblemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Problem::class, 40)->create();
    }
}

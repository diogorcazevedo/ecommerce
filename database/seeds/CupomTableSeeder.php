<?php

use Illuminate\Database\Seeder;
use ecommerce\Models\Cupom;

class CupomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cupom::class,10)->create();
    }
}

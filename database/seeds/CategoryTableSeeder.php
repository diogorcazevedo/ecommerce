<?php

use Illuminate\Database\Seeder;
use ecommerce\Models\Category;
use ecommerce\Models\Product;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,10)->create()->each(function($c){
            for($i = 0; $i <=5; $i++){
                $c->products()->save(factory(Product::class)->make());
            }
        });
    }
}

<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = \App\Color::all();
        factory(\App\Product::class, 100)->create()->each(function ($product) use (&$colors) {
            /** @var \App\Product $product */
            foreach (range(1, 5) as $i) {
                $product->productVariations()->save(
                    factory(\App\ProductVariation::class)->make([
                        'color_id' => $i
                    ])
                );
            }
        });
    }
}

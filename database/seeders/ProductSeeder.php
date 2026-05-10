<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $intro = "Nikmati pengalaman grill premium di rumah bersama keluarga atau teman! Paket lengkap ini sudah termasuk daging berkualitas, pelengkap, saus khas Doyan, hingga margarin. Siap masak dan praktis!\n\nIsi Paket:\n";

        $products = [
            [
                'name' => 'Paket 2 (2-3 Orang)', 
                'price' => 178000, 
                'weight' => 750, 
                'price_per_gram' => 237.33, 
                'vector' => json_encode([178000, 750]),
                'description' => $intro . "- 500 gr beef slice\n- 250 gr chicken slice\n- 1 pack side dish\n- 1 pack onion + selada\n- 2 cups sauce\n- 1 cup margarin"
            ],
            [
                'name' => 'Paket 4 (4-5 Orang)', 
                'price' => 250000, 
                'weight' => 1000, 
                'price_per_gram' => 250.00, 
                'vector' => json_encode([250000, 1000]),
                'description' => $intro . "- 500 gr beef slice\n- 250 gr chicken slice\n- 250 gr saikoro wagyu\n- 2 packs side dish\n- 1 pack onion + selada\n- 4 cups sauce\n- 1 cup margarin"
            ],
            [
                'name' => 'Paket 6 (6-7 Orang)', 
                'price' => 355000, 
                'weight' => 1500, 
                'price_per_gram' => 236.67, 
                'vector' => json_encode([355000, 1500]),
                'description' => $intro . "- 500 gr beef slice\n- 500 gr chicken slice\n- 500 gr saikoro wagyu\n- 3 packs side dish\n- 2 packs union + selada\n- 6 cups sauce\n- 2 cups margarin"
            ],
            [
                'name' => 'Paket 8 (8-9 Orang)', 
                'price' => 449000, 
                'weight' => 2000, 
                'price_per_gram' => 224.50, 
                'vector' => json_encode([449000, 2000]),
                'description' => $intro . "- 1000 gr beef slice\n- 500 gr chicken slice\n- 500 gr saikoro wagyu\n- 4 packs side dish\n- 2 packs union + selada\n- 6 cups sauce\n- 2 cups margarin"
            ],
            ['name' => 'US Beef Marinated 500gr', 'price' => 99000, 'weight' => 500, 'price_per_gram' => 198.00, 'vector' => json_encode([99000, 500])],
            ['name' => 'US Beef Marinated 1000gr', 'price' => 197000, 'weight' => 1000, 'price_per_gram' => 197.00, 'vector' => json_encode([197000, 1000])],
            ['name' => 'US Beef Plain 250gr', 'price' => 48500, 'weight' => 250, 'price_per_gram' => 194.00, 'vector' => json_encode([48500, 250])],
            ['name' => 'US Beef Plain 500gr', 'price' => 93000, 'weight' => 500, 'price_per_gram' => 186.00, 'vector' => json_encode([93000, 500])],
            ['name' => 'US Beef Plain 1000gr', 'price' => 187000, 'weight' => 1000, 'price_per_gram' => 187.00, 'vector' => json_encode([187000, 1000])],
            ['name' => 'Chicken Marinated 500gr', 'price' => 60000, 'weight' => 500, 'price_per_gram' => 120.00, 'vector' => json_encode([60000, 500])],
            ['name' => 'Chicken Marinated 1000gr', 'price' => 106000, 'weight' => 1000, 'price_per_gram' => 106.00, 'vector' => json_encode([106000, 1000])],
            ['name' => 'Chicken Plain 250gr', 'price' => 25000, 'weight' => 250, 'price_per_gram' => 100.00, 'vector' => json_encode([25000, 250])],
            ['name' => 'Chicken Plain 500gr', 'price' => 50000, 'weight' => 500, 'price_per_gram' => 100.00, 'vector' => json_encode([50000, 500])],
            ['name' => 'Chicken Plain 1000gr', 'price' => 96000, 'weight' => 1000, 'price_per_gram' => 96.00, 'vector' => json_encode([96000, 1000])],
            ['name' => 'Saikoro Wagyu 250gr', 'price' => 49500, 'weight' => 250, 'price_per_gram' => 198.00, 'vector' => json_encode([49500, 250])],
            ['name' => 'Saikoro Wagyu 500gr', 'price' => 99000, 'weight' => 500, 'price_per_gram' => 198.00, 'vector' => json_encode([99000, 500])],
            ['name' => 'Saikoro Wagyu 1000gr', 'price' => 195000, 'weight' => 1000, 'price_per_gram' => 195.00, 'vector' => json_encode([195000, 1000])],
        ];

        foreach ($products as $product) {
            \Illuminate\Support\Facades\DB::table('products')->insert(array_merge($product, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}

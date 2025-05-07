<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Product::factory()->create([
            'name' => 'Iphone 16',
            'price' => 499,
            'category' => 'Electronics',
            'image_url' => 'https://www.dateks.lv/images/pic/1200/1200/168/1808.jpg',
        ]);

        Product::factory()->create([
            'name' => 'Dell XPS 13',
            'price' => 999,
            'category' => 'Electronics',
            'image_url' => 'https://gfx3.senetic.com/akeneo-catalog/7/4/9/c/749c23dba36b8f9b292b5b8c4d0796f6b739c24a_1763632_1J7RV_image1.jpg',
        ]);

        Product::factory()->create([
            'name' => 'Harry Potter',
            'price' => 19.99,
            'category' => 'Books',
            'image_url' => 'https://i.ebayimg.com/images/g/tnEAAOSwmABm7KxJ/s-l1200.jpg',
        ]);

        Product::factory()->create([
            'name' => 'The Great Gatsby',
            'price' => 10.99,
            'category' => 'Books',
            'image_url' => 'https://i.ebayimg.com/images/g/tnEAAOSwmABm7KxJ/s-l1200.jpg',
        ]);

        Product::factory()->create([
            'name' => 'Nike Air Max',
            'price' => 129.99,
            'category' => 'Footwear',
            'image_url' => 'https://photos6.spartoo.de/photos/283/28386585/28386585_1200_A.jpg',
        ]);

        Product::factory()->create([
            'name' => 'Adidas Ultraboost',
            'price' => 159.99,
            'category' => 'Footwear',
            'image_url' => 'https://photos6.spartoo.de/photos/283/28386585/28386585_1200_A.jpg',
        ]);

        Product::factory()->create([
            'name' => 'T-shirt',
            'price' => 19.99,
            'category' => 'Clothing',
            'image_url' => 'https://jayblancofficial.com/wp-content/uploads/2021/09/T-Shirt-Flat-White-Basic-uai-1200x1200.jpg',
        ]);

        Product::factory()->create([
            'name' => 'Jeans',
            'price' => 49.99,
            'category' => 'Clothing',
            'image_url' => 'https://jayblancofficial.com/wp-content/uploads/2021/09/T-Shirt-Flat-White-Basic-uai-1200x1200.jpg',
        ]);
    }
}

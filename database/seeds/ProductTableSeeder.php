<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => '/images/mockingbird.jpg',
            'title' => 'Убить пересмешника',
            'description' => '«Уби́ть пересме́шника» — роман американской писательницы Харпер Ли, написанный в жанре воспитательного романа. Опубликован в 1960 году. В 1961 году получил Пулитцеровскую премию',
            'price' => 600
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => '/images/liedown.jpg',
            'title' => 'Lie Down in Darkness',
            'description' => 'Lie Down in Darkness is a novel by American novelist William Styron published in 1951. It was his first novel, written when he was 26 years old, and received a great deal of critical acclaim.',
            'price' => 500
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => '/images/James_Herriot__All_Things_Wise_and_Wonderful.jpg',
            'title' => 'All_Things_Wise_and_Wonderful',
            'description' => '“Surely no one can read Herriot without gaining a new and compassionate insight into All Things Wise and Wonderful in the world around him. A grand book.',
            'price' => 800
        ]);
        $product->save();
    }
}

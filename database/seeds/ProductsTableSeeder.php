<?php

use App\Product; // pentru a citii produsele de mai jos
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    /* Aici introduci produsele pentru a le migra in Baza de Date cu tot ce ai scris cand ai creat table  */

        //Laptops
        for ($i = 1; $i < 20; $i++) {
            Product::create([
                'name' => 'Laptop' . $i,
                'slug' => 'laptop-' . $i,
                'details' => [13, 14, 15][array_rand([13, 14, 15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] . 'TB SSD, 32GB RAM',
                'price' => rand(129999, 249999),
                'oldprice' => rand(209999, 309999),
                'description' => 'Lorem' . $i . ' ipsum dolor sit amet, consecterut adipsicing elit. Ipsum temporis iusto ipsa, asperiores voluptar unde aspertanur praesentionu in? Alisquam , dolores!',
            ])->categories()->attach(1);
        }

        $product = Product::find(1);
        $product->categories()->attach(2);

        //Desktop
        for ($i = 1; $i < 20; $i++) {
            Product::create([
                'name' => 'Desktop' . $i,
                'slug' => 'desktop-' . $i,
                'details' => [24, 25, 27][array_rand([24, 25, 27])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] . 'TB SSD, 32GB RAM',
                'price' => rand(229999, 349999),
                'oldprice' => rand(309999, 409999),
                'description' => 'Lorem' . $i . ' ipsum dolor sit amet, consecterut adipsicing elit. Ipsum temporis iusto ipsa, asperiores voluptar unde aspertanur praesentionu in? Alisquam , dolores!',
            ])->categories()->attach(2);
        }

        //Camera
        for ($i = 1; $i < 16; $i++) {
            Product::create([
                'name' => 'Camera' . $i,
                'slug' => 'camera-' . $i,
                'details' => [24, 25, 27][array_rand([24, 25, 27])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] . 'TB SSD, 32GB RAM',
                'price' => rand(229999, 349999),
                'oldprice' => rand(309999, 409999),
                'description' => 'Lorem' . $i . ' ipsum dolor sit amet, consecterut adipsicing elit. Ipsum temporis iusto ipsa, asperiores voluptar unde aspertanur praesentionu in? Alisquam , dolores!',
            ])->categories()->attach(3);
        }
        //Cereals
        for ($i = 1; $i < 20; $i++) {
            Product::create([
                'name' => 'Cereals' . $i,
                'slug' => 'cereals-' . $i,
                'details' => [24, 25, 27][array_rand([24, 25, 27])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] . 'TB SSD, 32GB RAM',
                'price' => rand(229999, 349999),
                'oldprice' => rand(309999, 409999),
                'description' => 'Lorem' . $i . ' ipsum dolor sit amet, consecterut adipsicing elit. Ipsum temporis iusto ipsa, asperiores voluptar unde aspertanur praesentionu in? Alisquam , dolores!',
            ])->categories()->attach(4);
        }
        // Select random entries to be featured
        Product::whereIn('id', [1, 12, 22, 31, 41, 43, 47, 51, 53, 61, 69, 73, 80])->update(['featured' => true]);

    }
}

// Acum voi sterge produsele pentru a adauga mai multe tipuri de produse , categorii ... si nu le vom mai afisa la fel cum am facut mai sus enumerandule pe rand ...


// Dupa ce ai terminat cu toate produsele , intra in CMD si ruleaza comanda > php artisan db:seed , daca vrei sa modifici ceva de mai sus , te duci inapoi la CMD si rulezi comanda > php artisan migrate:refresh --seed  cu aceasta comanda dai refresh la table

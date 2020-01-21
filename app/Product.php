<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories() {
        return $this->belongsToMany('App\Category');
    }


    public function presentPrice(){
    /* Asa afisezi $ semnul dolar sau orice alt semn in fata produsului pe WINDOWS */
        return "$".number_format($this->price / 100, 2);

    /* Asa afisezi $ Semnul dolar pe MAC OS */
        // return money_format('$%i', $this->price / 100);
    }
    /* Old Price Present */
    public function presentOldPrice() {

        return "$".number_format($this->oldprice / 100, 2);
    }

    // Aici dai cate produse sa afiseze in slider Might Also Like
    public function scopeMightAlsoLike($query) {

        return $query->inRandomOrder()->take(8);
    }
}

<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use SearchableTrait, Searchable;

        /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.details' => 10,
            'products.description' => 2,
        ],
    ];

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

    /**
     * Get the indexable data array for the model.
     * 
     * @return array 
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $extraFields = [
            'categories' => $this->categories,
        ];

        return array_merge($array, $extraFields);
    }  
}

<?php

namespace App\Models;

use App\Traits\MerchantTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use MerchantTrait;
    protected $fillable = ['name','user_id','slug','store_id','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}

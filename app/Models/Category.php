<?php

namespace App\Models;

use App\Traits\MerchantTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use MerchantTrait;

    protected $fillable = ['name','user_id','slug','store_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

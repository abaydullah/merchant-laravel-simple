<?php

namespace App\Models;

use App\Traits\MerchantTrait;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use MerchantTrait;
    protected $fillable = ['name','user_id','slug'];
}

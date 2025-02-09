<?php

namespace App\Traits;

use App\Models\Scopes\MerchantScope;
use App\Models\User;

trait MerchantTrait
{
    protected static function bootMerchantTrait(): void
    {
        static::addGlobalScope(new MerchantScope());

        static::creating(function ($model) {
            if (session()->has('userId')) {
                $model->user_id = session()->get('userId');
            }
//
//            if (auth()->id()) {
//                $model->user_id = auth()->id();
//            }
        });
    }

    public function merchant()
    {
        return $this->belongsTo(User::class);
    }
}

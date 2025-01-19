<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = [];

    public function penyewaan()
    {
        return $this->hasOne(Penyewaan::class, 'no_pembayaran', 'no_pembayaran');
    }
}

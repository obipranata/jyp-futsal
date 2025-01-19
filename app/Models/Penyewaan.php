<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'no_pembayaran', 'no_pembayaran');
    }
}

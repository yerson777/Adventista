<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diezmo extends Model
{
    use HasFactory;

    public function miembro()
    {
        return $this->belongsTo(Miembro::class);
    }
}

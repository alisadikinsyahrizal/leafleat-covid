<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use SoftDeletes;
    protected $table = "laporan";
    protected $fillable = [
        'berita', 'inspirasi',
    ];
    protected $hidden = [];
}

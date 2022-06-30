<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Werkorder extends Model
{
    protected $table = 'werkorders';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'omschrijving',
        'klant',
        'plandatum',
        'plantijd',
        'opleverdatum',
        'oplevertijd'
    ];

    public static function create(array $array)
    {

    }
}

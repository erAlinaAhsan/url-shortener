<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShortener extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'link', 'ip', 'city', 'country', 'latitude', 'longitude', 'timezone', 'currency_code', 'currency_symbol'];
}

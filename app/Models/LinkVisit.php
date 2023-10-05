<?php

namespace App\Models;

use App\Models\Link;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class LinkVisit extends Model
{
    protected $fillable = [
        'link_id', // Foreign key linking to the corresponding URL shortener
        'ip',
        'city',
        'country',
        'latitude',
        'longitude',
        'timezone',
        'currency_code',
        'currency_symbol',
        'created_at', // Timestamp of the visit
    ];

    // Define the relationship with the URL shortener
    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}

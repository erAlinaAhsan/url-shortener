<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'link'];

    // Define the relationship with the LinkVisit model
    public function linkVisits()
    {
        return $this->hasMany(LinkVisit::class);
    }
}

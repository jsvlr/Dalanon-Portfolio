<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    protected $fillable = [
        "header",
        "subheader",
        "position",
        "profile_image_url",
        "background_image_url",
        "logo_image_url",
        "in_used"
    ];


    protected $casts = [
        'social_links' => 'array'
    ];
}

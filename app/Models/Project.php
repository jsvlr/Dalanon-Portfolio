<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'tech_stacks',
        'github_link',
        'demo_link',
        'status',
        'date_completed'
    ];

    protected $casts = [
        'tech_stacks' => 'array'
    ];
}

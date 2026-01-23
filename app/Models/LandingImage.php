<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingImage extends Model
{
    protected $fillable = ['image_path', 'alt_text', 'is_active'];
}

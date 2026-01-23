<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectVideo extends Model
{
    protected $fillable = ['video_path', 'title', 'description', 'is_active'];
}

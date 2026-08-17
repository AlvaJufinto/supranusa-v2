<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename', 'path', 'mime_type', 'size',
        'alt_text', 'caption', 'usage', 'usage_id'
    ];

    protected $casts = ['size' => 'integer'];
}

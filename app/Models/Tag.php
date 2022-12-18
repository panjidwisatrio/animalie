<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailTag;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_tag',
        'slug',
        'color'
    ];

    public function detail_tag() {
        return $this->belongsTo(DetailTag::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'ihe',
        'program_title',
        'level_of_degree',
        'format',
        'alternate_route_to_certification',
        'category_of_credentialing',
        'url_for_program',
    ];
}

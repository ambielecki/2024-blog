<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public $hidden = ['id'];
    protected $table = 'pages';

    protected function casts(): array
    {
        return [
            'additional_content' => 'array',
        ];
    }
}

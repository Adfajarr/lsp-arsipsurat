<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mail extends Model
{
    protected $fillable = ['title', 'number', 'date', 'category_id', 'file_path'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

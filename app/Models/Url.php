<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUniqueIds;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasUniqueIds;
    protected $fillable = [
        'original_url',
        'user_id',
        'code'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
}

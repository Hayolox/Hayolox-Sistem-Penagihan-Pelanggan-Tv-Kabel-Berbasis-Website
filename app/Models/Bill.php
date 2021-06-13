<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'month_id', 'year_id'];

    public function user()
    {
        return $this->hasOne( User::class, 'id', 'user_id');
    }

    public function month()
    {
        return $this->hasOne( Month::class, 'id', 'month_id');
    }

    public function year()
    {
        return $this->hasOne( Year::class, 'id', 'year_id');
    }
    
}

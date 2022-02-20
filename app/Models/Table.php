<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, 'table_user')
            ->withPivot('id')
            ->withPivot('mobile_number')
            ->withPivot('guest_number')
            ->withPivot('datetime')
            ->withPivot('status');
            // ->withPivot('date')
            // ->withPivot('time')
        ;
    }
    protected $fillable = [
        'id',
        'number',
        'reserved',
    ];
}
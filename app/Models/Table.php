<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function tables()
    {
        return $this->belongsToMany(Table::class, 'table_user')
            ->withPivot('id')
            ->withPivot('mobile_number')
            ->withPivot('guest_number')
            ->withPivot('datetime');
    }
}

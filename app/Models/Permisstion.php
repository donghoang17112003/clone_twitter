<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisstion extends Model
{
    use HasFactory;
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    protected $fillable = [
        'name',
    ];
    protected $table = 'permissions';
}

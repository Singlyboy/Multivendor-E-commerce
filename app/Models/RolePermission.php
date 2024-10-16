<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function role()
    {

        return $this->belongsToMany(Role::class);
        
    }
    
    public function permission()
    {
        return $this->belongsToMany(Permission::class);
           
    }
}

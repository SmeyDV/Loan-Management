<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';

    protected $fillable = [
        'admin_name',
        'admin_password',
    ];

    public $timestamps = false; // Only if your table doesn’t have created_at / updated_at
}

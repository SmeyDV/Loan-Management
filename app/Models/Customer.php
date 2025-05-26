<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'name',
        'khmer_name',
        'phone',
        'verification_photo',
    ];

    /**
     * Get the loans associated with the customer.
     */
    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}

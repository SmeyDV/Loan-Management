<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'loan_amount',
        'has_ensurer',
        'ensurer_id',
        'starting_date',
        'payment_frequency',
        'interest_rate',
        'currency',
        'status',
    ];

    /**
     * The customer who took the loan.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * The ensurer (optional).
     */
    public function ensurer()
    {
        return $this->belongsTo(Ensurer::class);
    }
}

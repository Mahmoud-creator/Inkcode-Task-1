<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = "";

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('id', 'like', '%' . $search . '%')
        ));

    }

    public function getOrders(){
        return Order::all();
    }

}

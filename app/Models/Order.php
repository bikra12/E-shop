<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table= 'orders';
    protected $fillable =[

        'first_name',
        'last_name',
        'email',
        'phoneno',
        'address',
        'address2',
        'city',
        'state',
        'country',
        'pincode',
        'status',
        'message',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}

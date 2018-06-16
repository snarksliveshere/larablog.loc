<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'address', 'email', 'phone'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function add($fields)
    {
        $order = new static;
        $order->fill($fields);
        $order->save();

        return $order;
    }

}

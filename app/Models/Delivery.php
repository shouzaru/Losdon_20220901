<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;
    protected $fillable = ['item_id','DeliveryQuantity','date'];

    // Itemsテーブルとのリレーション （こっちのDeliceryテーブルは従テーブル側）
    public function user() {
        return $this->belongsTo('App\Models\Item');
    }
}

<?php

namespace App\Models;

use App\Exceptions\InternalException;
use Illuminate\Database\Eloquent\Model;

class ProductSku extends Model
{
    protected $fillable = [
        'title','description','price','stock'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    //减库存
    public function decreaseStock($amount)
    {
        if($amount < 0){
            throw new InternalException('减库存不可小于0');
        }
        //需要返回是因为执行完后会返回受影响的行数，如果没有受影响的行数证明库存不足。
        return $this->where('id',$this->id)->where('stock','>=',$amount)->decrement('stock',$amount);
    }

    //增加库存
    public function addStock($amount)
    {
        if($amount < 0){
            throw new InternalException('加库存不可小于0');
        }

        $this->increment('stock',$amount);
    }
}

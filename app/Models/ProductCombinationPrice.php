<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProductCombinationPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_type_id',
        'frame_id',
        'glass_id',
        'handle_id',
        'base_price',
    ];

    public function productType()
    {
        return $this->belongsTo(ProductType::class,'product_type_id');
    }

    public function frame()
    {
        return $this->belongsTo(Frame::class,'frame_id');
    }

    public function glass()
    {
        return $this->belongsTo(Glass::class,'glass_id');
    }

    public function handle()
    {
        return $this->belongsTo(Handle::class,'handle_id');
    }

    public static function checkAndUpdateOrCreateItem( $condition, $attributes)
    {
        $self = self::query()->where($condition)->first();

        if ($self) {
            if ($self->base_price != $attributes['base_price']) {
                $self->base_price = $attributes['base_price'];
                $self->save();
            }
        } else {
            $self = self::create(array_merge($condition,$attributes));
        }

        return $self;
    }
}

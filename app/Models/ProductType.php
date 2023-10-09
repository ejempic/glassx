<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function handle(): HasOne
    {
        return $this->hasOne(Handle::class, 'product_type_id');
    }

    public function frame(): HasOne
    {
        return $this->hasOne(Handle::class);
    }

    public function glass(): HasOne
    {
        return $this->hasOne(Glass::class);
    }

    public function upgrade()
    {
        return $this->belongsToMany(Upgrade::class,'product_type_upgrades','product_type_id','upgrade_id');
    }

    public function glassUpgrade()
    {
        return $this->belongsToMany(GlassUpgrade::class,'product_type_glass_upgrades','product_type_id','glass_upgrade_id');
    }
}

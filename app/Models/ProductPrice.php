<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getTable()
    {
        return 'product_prices';
    }

    public function setUnitPriceAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['unit_price'] = $value * 100;
        } else {
            $this->attributes['unit_price'] = null;
        }
    }

    public function setCostPerUnitAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['cost_per_unit'] = $value * 100;
        } else {
            $this->attributes['cost_per_unit'] = null;
        }
    }
    public function getUnitPriceAttribute($value)
    {
        // dd($this->attributes['unit_price']=$value / 100);
        if (isset($value)) {
            return $value / 100;
        } else {
            return null;
        }
    }

    public function getCostPerUnitAttribute($value)
    {
        if (isset($value)) {
            return $value / 100;
        } else {
            return null;
        }
    }

    public function setDirectCostAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['direct_cost'] = $value * 100;
        } else {
            $this->attributes['direct_cost'] = null;
        }
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // public function productVariation()
    // {
    //     return $this->belongsTo(\VentureDrake\LaravelCrm\Models\ProductVariation::class);
    // }

    // public function scopeDefault($query)
    // {
    //     return $query->where('currency', Setting::currency() ?? 'USD');
    // }
}

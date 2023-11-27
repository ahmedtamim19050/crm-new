<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $searchable = [
        'name',
    ];

    protected $filterable = [
        'user_owner_id',
        'labels.id',
    ];

    public function getSearchable()
    {
        return $this->searchable;
    }

    public function getTable()
    {
        return 'products';
    }

    public function productPrices()
    {
        return $this->hasMany(ProductPrice::class);
    }
    public function setUnitPriceAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['unit_price'] = $value * 100;
        } else {
            $this->attributes['unit_price'] = null;
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

    // public function getDefaultPrice()
    // {
    //     return $this->productPrices()->where('currency', Setting::currency()->value ?? 'USD')->first();
    // }

    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    // public function productCategory()
    // {
    //     return $this->belongsTo(ProductCategory::class);
    // }

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'user_updated_id');
    }

    public function deletedByUser()
    {
        return $this->belongsTo(User::class, 'user_deleted_id');
    }

    public function restoredByUser()
    {
        return $this->belongsTo(User::class, 'user_restored_id');
    }

    public function ownerUser()
    {
        return $this->belongsTo(User::class, 'user_owner_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    /**
     * Get the xero item associated with the product.
     */
    // public function xeroItem()
    // {
    //     return $this->hasOne(\VentureDrake\LaravelCrm\Models\XeroItem::class);
    // }

    // public function taxRate()
    // {
    //     return $this->belongsTo(\VentureDrake\LaravelCrm\Models\TaxRate::class);
    // }
}

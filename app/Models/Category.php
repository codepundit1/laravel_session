<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\SubCategory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sub_category():HasMany
    {
        return $this->hasMany(SubCategory::class);
    }

}

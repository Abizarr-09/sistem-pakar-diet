<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DietType extends Model
{
    protected $fillable = ['name', 'description', 'pantangan', 'explanation'];

    public function diseases(): HasMany
    {
        return $this->hasMany(Disease::class);
    }

    public function diagnoses(): HasMany
    {
        return $this->hasMany(Diagnosis::class, 'result_diet_id');
    }
}

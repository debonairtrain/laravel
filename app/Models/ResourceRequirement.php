<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\LazyCollection;

class ResourceRequirement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getAllRequirements(): LazyCollection
    {
        return $this->query()->cursor()->remember();
    }
}

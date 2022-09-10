<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
      "name",
      "parent_ref_id",
    ];

    public function services()
    {
           
        return $this->hasMany(Service::class);

    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Installment extends Model
{
    use HasFactory;
    protected $fillable = [
      "name",
      "user_ref_id",
      "installment_count",
      "service_ref_id",
      "start_price",
      "end_price"
    ];

    public function services()
    {
           
        return $this->hasMany(Service::class);

    }
}

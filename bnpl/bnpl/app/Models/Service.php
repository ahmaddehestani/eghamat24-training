<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Installment;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_ref_id",
        "category_ref_id",
        "description",
        "title",
        "installment_ref_id",
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_ref_id', 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_ref_id', 'user_id');
    }
    public function installment()
    {
        return $this->belongsTo(Installment::class,'installment_ref_id', 'installment_id');
    }
}

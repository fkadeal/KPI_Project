<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSells extends Model
{
    use HasFactory;
    protected $fillable = [
        'targete',
        'sells'
    ]; 
    
    protected $hidden = ['updated_at'];
    public function user()
        {
            return $this->belongsTo(User::class);
        }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    // protected $table = 'items';
    protected $fillable = ['title', 'description', 'status', 'image', 'price', 'user_id', 'menu_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}

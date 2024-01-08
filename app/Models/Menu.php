<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    protected $fillable = ['title' ,'type' ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
}

/*
$table->Increments('id');
            $table->string('title');
            $table->string('type')->unique();
            $table->text('description');
            $table->boolean('status');
            $table->string('image');
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            */
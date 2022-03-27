<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory , Sluggable;
   
    
    protected $table="posts";

    protected $fillable = ['title','desc','slug','uder_id' ,'created_at' , 'updated_at'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    public $timestamps = true;

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}


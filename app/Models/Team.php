<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class Team extends WriteMvBaseModel
{
   use HasFactory;

   protected $guarded = [];

   public function users()
   {
       return $this->hasMany(User::class);
   }

   public function blogs()
   {
       return $this->hasMany(Blog::class);
   }

   public function posts()
   {
       return $this->hasMany(Post::class);
   }
}

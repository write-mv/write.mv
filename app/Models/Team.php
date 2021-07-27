<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends WriteMvBaseModel
{
   use HasFactory;

   protected $guarded = [];

   public function users() : HasMany
   {
       return $this->hasMany(User::class);
   }

   public function blogs() : HasMany
   {
       return $this->hasMany(Blog::class);
   }

   public function posts() : HasMany
   {
       return $this->hasMany(Post::class);
   }
}

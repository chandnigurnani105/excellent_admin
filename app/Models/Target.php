<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Target extends Model
{
    use HasFactory;
    protected $table = "targets";

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'due_date',
        'blog',
        'social_media',
        'website',
        'apps',
        'total_of_target',
        'user_id',
        'role',
        'hr_type'
    ];
   
}

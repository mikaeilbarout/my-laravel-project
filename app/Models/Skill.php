<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    // Table name in the database (Laravel automatically guesses 'skills', but defining it is good practice)
    protected $table = 'skills';

    // Mass-assignable attributes
    protected $fillable = [
        'name',
    ];

    /**
     * Many-to-Many relationship with the User model.
     */
    public function users()
    {
        // 1st arg: Target model
        // 2nd arg: Pivot table name
        // 3rd arg: Foreign key of this model in the pivot table (skill_id)
        // 4th arg: Foreign key of the target model in the pivot table (user_id)
        return $this->belongsToMany(User::class, 'skill_user', 'skill_id', 'user_id')
                    ->withTimestamps(); // If pivot table has created_at and updated_at columns
    }
}
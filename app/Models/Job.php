<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';

    // Make sure 'description' is included
    protected $fillable = ['title', 'salary', 'employer_id', 'description'];

    public function employer()
    {
        return $this->belongsTo(\App\Models\Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Tag::class, 'job_listing_tag', 'job_listing_id', 'tag_id');
    }
}

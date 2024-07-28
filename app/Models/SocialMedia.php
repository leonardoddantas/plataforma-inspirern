<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_medias';

    protected $fillable = [
        'business_id',
        'socialMediaName',
        'socialMediaURL',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}

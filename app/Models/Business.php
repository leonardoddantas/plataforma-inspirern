<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'businessName',
        'category',
        'cnpj',
        'description',
        'phone',
        'email',
        'websiteURL',
        'road',
        'number',
        'cep',
        'neighborhood',
        'city',
        'state',
        'operatingSchedule',
        'locationPhoto',
        'ownerName',
        'ownerTelephone',
        'ownerEmail',
        'ownerCpf',
        'status',
        'ratingBusiness',
        'registrationDate',
        'user_id'
    ];

    public function socialMedias()
    {
        return $this->hasMany(SocialMedia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'business_id');
    }
}

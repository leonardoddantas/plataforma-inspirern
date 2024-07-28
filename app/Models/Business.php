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
    ];

    public function socialMedias()
    {
        return $this->hasMany(SocialMedia::class);
    }
}

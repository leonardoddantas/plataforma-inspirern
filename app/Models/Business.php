<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'businessName',
        'category',
        'cnpj',
        'description',
        'phone',
        'email',
        'websiteURL',
        'socialMedia',
        'road',
        'number',
        'cep',
        'neighborhood',
        'city',
        'state',
        'operatingDays',
        'operatingHours',
        'locationPhoto',
        'ownerName',
        'ownerTelephone',
        'ownerEmail',
        'ownerCpf',
        'status',
        'ratingBusiness',
    ];
}

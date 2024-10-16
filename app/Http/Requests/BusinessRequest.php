<?php

namespace App\Http\Requests;

use App\Models\Business;
use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'businessName' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'cnpj' => ['string', 'unique:businesses'],
            'phone' => ['string'],
            'email' => ['required', 'string', 'lowercase', 'email'],
            'websiteURL' => ['string'],
            'locationPhoto' => ['required'],
            'road' => ['required', 'string'],
            'number' => ['required', 'string'],
            'neighborhood' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'cep' => ['required', 'string'],
            'operatingDays' => ['required', 'array'],
            'openingTime' => ['required', 'array'],
            'closingTime' => ['required', 'array'],
            'ownerName' => ['required', 'string', 'max:255'],
            'ownerTelephone' => ['required', 'string'],
            'ownerEmail' => ['required', 'string', 'lowercase', 'email'],
            'ownerCpf' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'businessName.required' => 'O campo nome de negócio é obrigatório',
            'businessName.max' => 'O campo nome de negócio deve ter no máximo 255 caracteres',

            'category.required' => 'O campo categoria é obrigatório',
            'category.max' => 'O campo categoria deve ter no máximo 255 caracteres',

            'description.required' => 'O campo descrição é obrigatório',

            'cnpj.string' => 'O CNPJ deve ser uma string',
            'cnpj.unique' => 'Este CNPJ já está em uso',

            'phone.string' => 'O telefone deve ser uma string',

            'email.required' => 'O campo email é obrigatório',
            'email.string' => 'O email deve ser uma string',
            'email.lowercase' => 'O email deve estar em letras minúsculas',
            'email.email' => 'O email deve ser um endereço válido',

            'websiteURL.string' => 'A URL do site deve ser uma string',

            'locationPhoto.required' => 'O campo foto do local é obrigatório',

            'road.required' => 'O campo rua é obrigatório',
            'road.string' => 'A rua deve ser uma string',

            'number.required' => 'O campo número é obrigatório',
            'number.string' => 'O número deve ser uma string',

            'neighborhood.required' => 'O campo bairro é obrigatório',
            'neighborhood.string' => 'O bairro deve ser uma string',

            'city.required' => 'O campo cidade é obrigatório',
            'city.string' => 'A cidade deve ser uma string',

            'state.required' => 'O campo estado é obrigatório',
            'state.string' => 'O estado deve ser uma string',

            'cep.required' => 'O campo CEP é obrigatório',
            'cep.string' => 'O CEP deve ser uma string',

            'operatingDays.required' => 'O campo dias de operação é obrigatório',
            'operatingDays.array' => 'Os dias de operação devem ser um array',

            'openingTime.required' => 'O campo horário de abertura é obrigatório',
            'openingTime.array' => 'Os horários de abertura devem ser um array',

            'closingTime.required' => 'O campo horário de fechamento é obrigatório',
            'closingTime.array' => 'Os horários de fechamento devem ser um array',

            'ownerName.required' => 'O campo nome do proprietário é obrigatório',
            'ownerName.string' => 'O nome do proprietário deve ser uma string',
            'ownerName.max' => 'O nome do proprietário deve ter no máximo 255 caracteres',

            'ownerTelephone.required' => 'O campo telefone do proprietário é obrigatório',
            'ownerTelephone.string' => 'O telefone do proprietário deve ser uma string',

            'ownerEmail.required' => 'O campo email do proprietário é obrigatório',
            'ownerEmail.string' => 'O email do proprietário deve ser uma string',
            'ownerEmail.lowercase' => 'O email do proprietário deve estar em letras minúsculas',
            'ownerEmail.email' => 'O email do proprietário deve ser um endereço válido',

            'ownerCpf.required' => 'O campo CPF do proprietário é obrigatório',
            'ownerCpf.string' => 'O CPF do proprietário deve ser uma string',
        ];
    }
}

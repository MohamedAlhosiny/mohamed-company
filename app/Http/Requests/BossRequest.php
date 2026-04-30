<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BossRequest extends FormRequest
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
            'name' => ['string' , 'required' , 'min:4'] ,
            'email' => ['unique:bosses' , 'email:filter' , 'required'],
            'password' => ['required' , 'string' , 'confirmed']
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:20|unique:offers,name',
        'price'=>'required|numeric',
        'details'=>'required',
        
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>__('messages.your name is required'),
            'name.unique'=>__('messages.already a username'),
            'price.required'=>__('messages.inter your price offer'),
            'price.numeric'=>__("messages.inter youe plese Numbers"),
             'details'=>__('messages.inter your details plese')
        ];
    }
}

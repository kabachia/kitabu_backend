<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
	    'first_name' => ['required', 'min:2', 'alpha:ascii'], 
	    'middle_name' => ['min:2', 'alpha:ascii'], 
	    'last_name' => ['required', 'min:2', 'alpha:ascii'], 
	    'biography' => ['min:10'], 
	    'email' => ['required', 'email'],
        ];
    }
}

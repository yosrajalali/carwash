<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class submitRegisterRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone_number' => ['required', 'regex:/^09[0-9]{9}$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    public function validated($key = null, $default = null)
    {
        $validatedData = parent::validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
        return $validatedData;
    }
}

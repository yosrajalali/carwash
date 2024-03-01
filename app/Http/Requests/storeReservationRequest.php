<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class storeReservationRequest extends FormRequest
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
//    public function rules(): array
//    {
//        $rules = [
//            'first_name' => ['required', 'string'],
//            'last_name' => ['required', 'string'],
//            'phone_number' => [
//                'required',
//                'regex:/^09[0-9]{9}$/',
//            ],
//            'reservation_date' => ['required', 'date'],
//            'time_option' => ['required', 'in:earliest,choose'],
//        ];
//
//
//        if ($this->input('time_option') === 'choose') {
//            $rules['reservation_time'] = ['required'];
//        }
//
//        return $rules;
//    }

    public function rules(): array
    {

        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone_number' => [
                'required',
                'regex:/^09[0-9]{9}$/',
//                Route::unique('users', 'phone_number')->ignore($userId)
            ],
            'reservation_date' => ['required', 'date'],
            'reservation_time' => ['required'],
            'time_option' => [
                'required',
                'in:earliest,choose',
            ],
        ];
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed $service_id
 */
class storeUpdateRequest extends FormRequest
{
    public mixed $reservation_time;

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
            'reservation_time'=>[
                'required',
                'date_format:Y-m-d H:i:s',
                'after_or_equal:' . now()->format('Y-m-d H:i:s'),
                function ($attribute, $value, $fail) {
                    // Check if reservation time is within 3 days from today
                    $threeDaysLater = now()->addDays(3)->startOfDay();
                    $reservationTime = \Carbon\Carbon::parse($value);
                    if ($reservationTime->startOfDay() > $threeDaysLater) {
                        $fail('The reservation date and time cannot be more than 3 days from now.');
                    }
                },
            ],
            'service_id' => ['required']
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reservation_date' => 'required|date|after_or_equal:today',
            'reservation_time' => 'required|date_format:H:i',
            'number_of_people' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'reservation_date.required' => '予約日を入力してください。',
            'reservation_date.date' => '有効な日付を入力してください。',
            'reservation_date.after_or_equal' => '予約日は今日以降の日付を選択してください。',
            'reservation_time.required' => '予約時間を入力してください。',
            'reservation_time.date_format' => '時間はHH:mm形式で入力してください。',
            'number_of_people.required' => '人数を入力してください。',
            'number_of_people.integer' => '人数は整数で入力してください。',
            'number_of_people.min' => '人数は1人以上を指定してください。',
        ];
    }
}

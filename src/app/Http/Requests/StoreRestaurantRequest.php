<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'regin_id' => 'required|exists:genres,id',
            'genre_id' => 'required|exists:genres,id',
            'description' => 'required|string|max:1000',
            'image_url' => 'required|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}

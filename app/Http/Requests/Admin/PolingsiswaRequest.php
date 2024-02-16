<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PolingsiswaRequest extends FormRequest
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
            'feed_id' => 'required',
            'cerita' => 'max:200',
        ];
    }

    public function messages()
    {
        return [
            'cerita.max' => 'Maaf maksimal karakter 200 saja',
        ];
    }
}

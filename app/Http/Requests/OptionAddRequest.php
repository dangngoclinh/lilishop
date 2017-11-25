<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OptionAddRequest extends FormRequest
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
            'key' => 'required|unique:table_option|max:100'
        ];
    }

    public function messages()
    {
        return [
            'key.required' => 'Bạn chưa nhập Key',
            'key.unique' => 'Key đã tồn tại'
        ];
    }
}

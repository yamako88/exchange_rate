<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ExchangePost
 * @package App\Http\Requests
 */
class ExchangePost extends FormRequest
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
        $rules = [
            'exchange' => 'required|numeric'
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'exchange.required' => 'ドルを入力してください',
            'exchange.numeric' => '数値で入力してください'
        ];
    }
}

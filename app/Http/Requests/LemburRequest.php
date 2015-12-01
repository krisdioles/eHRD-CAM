<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LemburRequest extends Request
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
            'jangkawaktu' => 'required|numeric',
            'tgllembur'   => 'required|date',
            'keterangan'   => 'required',
        ];
    }
}

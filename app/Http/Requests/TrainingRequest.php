<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TrainingRequest extends Request
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
            'namatraining'  => 'required|min:3',
            'tgltraining'   => 'required|date',
            'lokasi'        => 'required',
            'anggaran'      => 'required|numeric',
            //'keterangan'    => '',
        ];
    }
}

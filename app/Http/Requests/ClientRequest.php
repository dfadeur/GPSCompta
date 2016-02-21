<?php

namespace GPSCompta\Http\Requests;

use GPSCompta\Http\Requests\Request;

class ClientRequest extends Request
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
            'name' => 'required',

            'secondname' => 'required',

            'zip' => 'required|max:10'
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JoinProjectRequest extends Request
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
            'join_a1' => 'required|max:3000',
            'join_a2' => 'required|max:3000',
            'join_a3' => 'required|max:3000',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'All fields are required',
        ];
    }
    
}

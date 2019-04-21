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
    public function rules($size)
    {   
        if($size==4){
            return [
                'join_a1' => 'required|max:255',
                'join_a2' => 'required|max:255',
                'join_a3' => 'required|max:255',
            ];
        }else if($size==5){
            return [
                'join_a1' => 'required|max:255',
                'join_a2' => 'required|max:255',
                'join_a3' => 'required|max:255',
                'join_extra_a1' => 'required|max:255',
            ];
        }
        return [
            'join_a1' => 'required|max:255',
            'join_a2' => 'required|max:255',
            'join_a3' => 'required|max:255',
            'join_extra_a1' => 'required|max:255',
            'join_extra_a2' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'All fields are required',
        ];
    }
    
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FinishedProjectRequest extends Request
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
            'description' => 'required|max:9000',
            'summary' => 'required|max:2000',
            'group_summary.*' => 'required|max:2000',
            'group_embedded.*' =>'active_url',
            'group_images.*.*' => 'image|max:2048'




        ];


        return $rules;
    }
}

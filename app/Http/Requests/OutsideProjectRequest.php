<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OutsideProjectRequest extends Request
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
            'name_et' => 'required|max:255',
            'description_et' => 'required|max:9000',
            'project_outcomes_et' => 'required|max:9000',
            'keywords_et' => 'required|max:9000',
            'email_et' => 'required',
            'g-recaptcha-response' => 'required',
        ];
        
        return $rules;
    }
}

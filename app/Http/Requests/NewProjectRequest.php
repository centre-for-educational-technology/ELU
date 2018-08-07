<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewProjectRequest extends Request
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
            'project_in_estonian' => 'required_without:project_in_english',
            'project_in_english' => 'required_without:project_in_estonian',
            'name_et' => 'required_if:project_in_estonian,==,true|max:255',
            'name_en' => 'required_if:project_in_english,==,true|max:255',
            'description_et' => 'required_if:project_in_estonian,==,true|max:9000',
            'description_en' => 'required_if:project_in_english,==,true|max:9000',
            'project_outcomes_et' => 'required_if:project_in_estonian,==,true|max:9000',
            'project_outcomes_en' => 'required_if:project_in_english,==,true|max:9000',
            'interdisciplinary_approach_et' => 'required_if:project_in_estonian,==,true|max:9000',
            'interdisciplinary_approach_en' => 'required_if:project_in_english,==,true|max:9000',
            'keywords_et' => 'required_if:project_in_estonian,==,true|max:9000',
            'keywords_en' => 'required_if:project_in_english,==,true|max:9000',
            'meetings_info_et' => 'required_if:project_in_estonian,==,true|max:9000',
            'meetings_info_en' => 'required_if:project_in_english,==,true|max:9000',
            'meetings_et' => 'required_if:project_in_estonian,==,true|max:9000',
            'meetings_en' => 'required_if:project_in_english,==,true|max:9000',
            'study_term' => 'required',
        ];
        
        return $rules;
    }
}

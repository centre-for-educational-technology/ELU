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
        $rules = [];
        
        $et_rules = array(
            'name_et' => 'required|max:255',
            'description_et' => 'required|max:9000',
            'project_outcomes_et' => 'required|max:9000',
            'interdisciplinary_approach_et' => 'required|max:9000',
            'keywords_et' => 'required|max:9000',
            'meetings_info_et' => 'required|max:9000',
            'meetings_et' => 'required|max:9000',
            'study_term' => 'required',
        );

        $en_rules = array(
            'name_en' => 'required|max:255',
            'description_en' => 'required|max:9000',
            'project_outcomes_en' => 'required|max:9000',
            'interdisciplinary_approach_en' => 'required|max:9000',
            'keywords_en' => 'required|max:9000',
            'meetings_info_en' => 'required|max:9000',
            'meetings_en' => 'required|max:9000',
            'study_term' => 'required',
        );

        $both_rules = array(
            'name_et' => 'required|max:255',
            'name_en' => 'required|max:255',
            'description_et' => 'required|max:9000',
            'description_en' => 'required|max:9000',
            'project_outcomes_et' => 'required|max:9000',
            'project_outcomes_en' => 'required|max:9000',
            'interdisciplinary_approach_et' => 'required|max:9000',
            'interdisciplinary_approach_en' => 'required|max:9000',
            'keywords_et' => 'required|max:9000',
            'keywords_en' => 'required|max:9000',
            'meetings_info_et' => 'required|max:9000',
            'meetings_info_en' => 'required|max:9000',
            'meetings_et' => 'required|max:9000',
            'meetings_en' => 'required|max:9000',
            'study_term' => 'required',
        );

        $rules[0] = $et_rules;
        $rules[1] = $en_rules;
        $rules[2] = $both_rules;
        
        return $rules;
    }
}

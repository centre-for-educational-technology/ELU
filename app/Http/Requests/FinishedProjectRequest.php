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
            'summary' => 'required|max:9000',
            'group_results.*' => 'required|max:2000',
            'group_activities.*' => 'required|max:2000',
            'group_partners.*' => 'max:2000',
            'group_students_opinion.*' => 'required|max:2000',
            'group_supervisor_opinion.*' => 'required|max:2000',
            'group_embedded.*' =>'active_url',
            'group_materials_types.*' => 'max:2000',
            'group_materials_links.*.*' => 'active_url',


        ];


        return $rules;
    }
}

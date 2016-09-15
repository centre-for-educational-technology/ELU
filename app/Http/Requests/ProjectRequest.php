<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectRequest extends Request
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
            'name' => 'required|max:255',
            'description' => 'required|max:3000',
            'integrated_areas' => 'required|max:3000',
            'embedded' => 'active_url',
//            'project_outcomes' => 'required|max:3000',
//            'student_outcomes' => 'required|max:3000',
//            'related_courses' => 'required|max:3000',
//            'project_start' => 'required|max:100',
//            'project_end' => 'required|max:100',
            'join_link' => 'active_url',
            'study_term' => 'required',
//            'institutes' => 'required',
            'supervisors' => 'required|max:3000',
            'status' => 'required',
            'tags' => 'required|max:3000',
        ];
    }
}

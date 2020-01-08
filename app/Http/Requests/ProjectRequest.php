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
            'aim' => 'required|max:9000',
            'project_outcomes' => 'required|max:9000',
            'meetings_dates_text' => 'required|max:3000',
            'embedded' => 'active_url',
            'join_deadline' => 'required|max:100',
            'study_term' => 'required',
            'supervisors' => 'required',
            'cosupervisors' => 'max:3000',
            'tags' => 'required|max:3000',
            'extra_info' => 'max:3000',
            'featured_image' => 'image',
            'study_year' => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectByStudentRequest extends Request
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
          'description' => 'required|max:9000',
//          'integrated_areas' => 'max:3000',
          'study_term' => 'required',
          'study_areas' => 'required',
//          'institutes' => 'required',
  //          'supervisors' => 'required',
          'cosupervisors' => 'max:3000',
          'tags' => 'required|max:3000',
          'extra_info' => 'max:3000'
      ];
    }
}

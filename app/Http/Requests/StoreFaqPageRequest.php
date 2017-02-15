<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreFaqPageRequest extends Request
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
          'what_et' => 'required|max:5000',
          'what_en' => 'required|max:5000',

          'why_et' => 'required|max:5000',
          'why_en' => 'required|max:5000',

          'when_et' => 'required|max:5000',
          'when_en' => 'required|max:5000',

          'with_who_et' => 'required|max:5000',
          'with_who_en' => 'required|max:5000',

          'how_et' => 'required|max:5000',
          'how_en' => 'required|max:5000',

          'which_et' => 'required|max:5000',
          'which_en' => 'required|max:5000',

      ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PageRequest extends Request
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
            'news_et' => 'required|max:1000',
            'news_en' => 'required|max:1000',
//            'faq' => 'required|max:9000',
            'info_et' => 'required|max:1000',
            'info_en' => 'required|max:1000',
        ];
    }
}

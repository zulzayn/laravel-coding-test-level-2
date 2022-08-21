<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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

        $rules['name'] = ['required' , 'max:255' , 'unique:projects,name'];

        return $rules;
    }

      /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {

        $messages = [];

        $messages['name.required']  = __("The :name field is required", ["name" => __("Name")]);
        $messages['name.max:255']  = __("The :name field cannot exceed 255 character", ["name" => __("Name")]);
        $messages['name.unique:projects,name']  = __("The :name has already been taken", ["name" => __("Name")]);

        return $messages;

    } 
}

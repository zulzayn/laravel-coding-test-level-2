<?php

namespace App\Http\Requests\v1;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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

        $rules['title'] = ['required' , 'max:255'];
        $rules['description'] = ['required' , 'max:255'];
        $rules['project_id'] = ['required'];
        $rules['user_id'] = ['required'];

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

        $messages['title.required']  = __("The :name field is required", ["name" => __("Title")]);
        $messages['title.max:255']  = __("The :name field cannot exceed 255 character", ["name" => __("Title")]);
        $messages['description.required']  = __("The :name field is required", ["name" => __("Description")]);
        $messages['description.max:255']  = __("The :name field cannot exceed 255 character", ["name" => __("Description")]);   

        return $messages;

    } 
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStatusStoreRequest extends FormRequest
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

        $rules['status'] = ['required' , 'max:255'];

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

        $messages['status.required']  = __("The :name field is required", ["name" => __("Status")]);
        $messages['status.max:255']  = __("The :name field cannot exceed 255 character", ["name" => __("Status")]);  

        return $messages;

    } 
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'person_name' => 'required_without_all:organisation_name,organisation_id|max:255',
            // 'person_id' => 'required_without_all:organisation_name,organisation_id,person_name|max:255',
            // 'organisation_name' => 'required_without_all:person_name,person_id|max:255',
            'organisation_id' => 'required',
            'title' => 'nullable|max:255',
            'amount' => 'nullable|numeric',
            // 'user_owner_id' => 'required',
            'code' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'person_name.required_without_all' => 'The contact person field is required if no organisation.',
            'organisation_name.required_without_all' => 'The organisation field is required if no contact person.',
            'person_id.required_without_all' => 'The contact person field is required if no organisation.',
            'organisation_id.required_without_all' => 'The organisation field is required of no contact person.'
        ];
    }
}

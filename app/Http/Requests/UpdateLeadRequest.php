<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeadRequest extends FormRequest
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
            'organisation_id' => 'required',
            'title' => 'nullable|max:255',
            'amount' => 'nullable|numeric',
            // 'user_owner_id' => 'required',
            'code' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'person_name.required_without_all' => 'The contact person field is required if no organisation.',
            'organisation_name.required_without_all' => 'The organisation field is required if no contact person.',
            'person_id.required_without_all' => 'The contact person field is required if no organisation.',
            'organisation_id.required_without_all' => 'The organisation field is required of no contact person.',
        ];
    }
}

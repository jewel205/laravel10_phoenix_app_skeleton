<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rule_name_unique = Rule::unique('roles', 'name');

        if($this->method() != 'POST') {
            $rule_name_unique->ignore($this->role->id, 'id');

        }

        return [
            'name'             => ['required',$rule_name_unique],
            'guard_name'       => ['required'],
            'permissions' => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
            'permissions.required' => 'Please select at least one permission.',
        ];
    }

}

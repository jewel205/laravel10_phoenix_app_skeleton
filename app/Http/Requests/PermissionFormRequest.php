<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionFormRequest extends FormRequest
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
        $rule_name_unique = Rule::unique('permissions', 'name');

        if($this->method() != 'POST') {
            $rule_name_unique->ignore($this->permission->id, 'id');

        }

        return [
            'name'             => ['required',$rule_name_unique],
            'guard_name'       => ['required'],
        ];
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
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
        $rule_email_unique = Rule::unique('users', 'email');

        if($this->method() != 'POST') {
            $rule_email_unique->ignore($this->user->id, 'id');
            return [
                'name'              => ['required'],
                'email'             => ['required','email',$rule_email_unique],
                'phone'             => ['nullable'],
                'is_active'         => ['required']
            ];
        }

        return [
            'name'              => ['required'],
            'email'             => ['required','email',$rule_email_unique],
            'phone'             => ['required'],
            'password'          => ['required', 'same:confirm-password'],
            'confirm-password'  => ['required'],
            'remarks'           => ['nullable'],
            'is_active'         => ['required']
        ];
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'is_active' => (int)$this->request->has('is_active') ? $this->is_active : 0
        ]);
    }
}

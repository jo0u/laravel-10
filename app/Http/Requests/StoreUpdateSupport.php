<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class StoreUpdateSupport extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
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


        $rules = [
            'subject' => 'required|min:3|max:255|unique:supports',
            'body' => [
                'required',
                'min:3',
                'max:100000',
            ],
        ];

        if($this->method() === 'PUT'){
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                //"unique:supports,subject,{$this->id},id"
                ValidationRule::unique('supports')->ignore($this->id)
            ];
        }

        return $rules;
    }
}

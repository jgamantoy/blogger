<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class CreateBlogRequest extends FormRequest
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
        return [
            'title' => 'required|string|min:1|max:24',
            'content' => 'required|string|min:1|max:24'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationException($validator))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl());
    }

    protected function prepareForValidation(): void
    {
        $publish = isset($this->publish) && $this->publish === 'on'
            ? true
            : false;

        $this->merge([
            'publish' => $publish
        ]);
    }
}

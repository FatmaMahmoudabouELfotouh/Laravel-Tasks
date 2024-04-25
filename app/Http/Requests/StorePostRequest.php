<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            "title"=>["required","unique:posts","min:3"],
            "body"=>"required|min:10",
            "image" => "image|mimes:jpg,png"
        ];
    }
    public function messages()
{
    return [
        'title.required' => 'please enter the title',
        'body.required' => 'please enter the body',
    ];
}
}

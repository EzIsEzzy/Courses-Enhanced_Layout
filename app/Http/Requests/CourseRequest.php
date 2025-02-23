<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
    protected $stopOnFirstFailure = true;
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'field' => ['required', 'string'],
            'duration' => ['required', 'numeric'],
            'image' => ['image', 'max:10000', 'mimes:png,jpg,jpeg'],
            'users' => ['required', 'numeric'],
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'You need to enter the name',
            'price.required' => 'You must enter a price or put 0 if it is free',
            'price.numeric' => 'The price must be a number',
            'duration.numeric' => 'The duration must be a number, make it something sensible',
            'image.image' => 'The image must be an image of type JPG, JPEG, or PNG',
            'users.required' => 'You must choose a user!',
        ];
    }
}

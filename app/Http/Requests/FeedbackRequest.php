<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'full_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],
            'preferred_date' => ['required', 'date'],
            'preferred_time' => ['required'],
            'message' => ['required'],
            'page_name' => ['required'],

            // EQUIPMENT TYPE
            'equipment_type_id' => [
                $this->has('equipment_type_id')
                    ? 'required'
                    : 'nullable',

                'exists:equipment_types,id'
            ],

            // CONTACT TYPE
            'contact_type' => [
                $this->has('contact_type')
                    ? 'required'
                    : 'nullable',

                'in:phone,email'
            ],

            // POSITION
            'career_id' => [
                $this->has('career_id')
                    ? 'required'
                    : 'nullable',

                'exists:careers,id'
            ],

            // FILE
            'file' => [
                $this->hasFile('file')
                    ? 'required'
                    : 'nullable',

                'file',
                'mimes:pdf,doc,docx',
                'max:5120'
            ],

        ];
    }
}

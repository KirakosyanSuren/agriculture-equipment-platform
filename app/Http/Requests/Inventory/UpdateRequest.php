<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            "title" => 'required',
            "slug" => 'required|unique:inventories',
            "brand_id" => 'required',
            "equipment_type_id" => 'required',
            "condition" => 'required',
            "model" => 'required',
            "serial_number" => 'required',
            "price" => 'required',
            "year" => 'required',
            "hour" => 'required',
            "engine" => 'required',
            "transmission" => 'required',
            "fuel_type" => 'required',
            "horsepower" => 'required',
            "location" => 'required',
            "short_description" => 'required',
            "description" => 'required',
            "images" => ['nullable', 'array', 'max:10'],
            'images.*' => [ 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'is_main' => ['required', 'integer'],
            'deleted_images' => ['nullable','array'],
            'deleted_images.*' => ['integer'],
        ];
    }
}

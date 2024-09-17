<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
        if ($this->id) {
            $rules = [
            ];

            foreach (languages() as $language) {
                $rules["name.$language->abbreviation"] = 'required|unique:experiences,name,' . $this->id . ',id';
            }
        } else {
            $rules = [
            ];

            foreach (languages() as $language) {
                $rules["name.$language->abbreviation"] = 'required|unique:experiences,name';
            }
        }

        return  $rules;
    }
}

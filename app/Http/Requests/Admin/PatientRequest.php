<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'name' => 'required',
            'nickname' => 'nullable',
            'phone' => 'required',
            'gender' => 'required|in:male,female',
            'postcode' => 'nullable',
            'city_id' => 'nullable|exists:cities,id',
            'nationality_id' => 'nullable|exists:nationalities,id',
            'package_id' => 'nullable|exists:packages,id',
            'address' => 'nullable',
            'status' => 'nullable|in:0,1',
            'email' => 'nullable',
            'password' => 'nullable',
        ];

        if ($this->id) {
            // Update scenario
            $rules['name'] .= '|unique:patients,name,' . $this->id;
            $rules['refer_code'] = 'nullable|unique:patients,refer_code,' . $this->id;
            $rules['nickname'] .= '|unique:patients,nickname,' . $this->id;
            $rules['phone'] .= '|unique:patients,phone,' . $this->id . '|unique:doctors,phone';
            $rules['postcode'] .= '|unique:patients,postcode,' . $this->id;
            $rules['email'] .= '|unique:patients,email,' . $this->id;
        } else {
            // Create scenario
            $rules['name'] .= '|unique:patients,name';
            $rules['refer_code'] = 'nullable|unique:patients,refer_code';
            $rules['nickname'] .= '|unique:patients,nickname';
            $rules['phone'] .= '|unique:patients,phone|unique:doctors,phone';
            $rules['postcode'] .= '|unique:patients,postcode';
            $rules['email'] .= '|unique:patients,email';
            $rules['password'] = 'required';
        }

        return $rules;
    }
}

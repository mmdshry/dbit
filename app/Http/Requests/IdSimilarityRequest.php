<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class IdSimilarityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'national_id' => 'required|ir_national_code',
            'birthday'    => 'required|shamsi_date_between:1300,1385',
            "first_name"   => "required|string|persian_alpha|max:100",
            "last_name"    => "required|string|persian_alpha|max:100",
            "fatherName"  => "required|string|persian_alpha|max:100"
        ];
    }
}

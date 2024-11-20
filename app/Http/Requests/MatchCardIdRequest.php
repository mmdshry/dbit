<?php

namespace App\Http\Requests;

use App\Rules\ShamsiDate;
use Auth;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MatchCardIdRequest extends FormRequest
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
            "card_number" => "required|ir_bank_card_number",
            'national_id' => 'required|ir_national_code',
            'birthday'    => ['required', new ShamsiDate()]
        ];
    }
}

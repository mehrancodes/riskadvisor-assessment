<?php

namespace App\Http\Requests;

use App\Enums\ContactPreferenceEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePersonalInformationRequest extends FormRequest
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
            'consumer.first_name' => ['required', 'string', 'max:225'],
            'consumer.last_name' => ['required', 'string', 'max:225'],
            'consumer.email' => ['required', 'email', 'max:225'],
            'consumer.phone_number' => ['required', 'string', 'max:225', 'regex:/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'],
            'consumer.contact_preference' => ['required', Rule::enum(ContactPreferenceEnum::class)],

            'submission.insurance_products' => ['required', 'array', 'min:1', 'max:3'],
            'submission.street_address' => ['string', 'max:225'],
            'submission.apt' => ['string', 'max:225'],
            'submission.city' => ['required', 'string', 'max:225'],
            'submission.state' => ['required', 'string', 'max:225'],
            'submission.zip_code' => ['required', 'string', 'max:225'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoRequest extends FormRequest
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
        $iconRule = $this->isMethod('post')
            ? 'required|image|mimes:jpg,jpeg,png,svg,webp'
            : 'nullable|image|mimes:jpg,jpeg,png,svg,webp';
        $bannerImageRule = $this->isMethod('post')
            ? 'required|image|mimes:jpg,jpeg,png,svg,webp'
            : 'nullable|image|mimes:jpg,jpeg,png,svg,webp';

        return [
            'name'       => 'required|string|max:100',
            'icon'       => $iconRule,
            'banner_image' => $bannerImageRule,
            'link'       => 'required|url|max:255',
            'promo_code' => 'required|string|max:50',
        ];
    }
}

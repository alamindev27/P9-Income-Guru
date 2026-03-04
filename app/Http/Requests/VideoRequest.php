<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VideoRequest extends FormRequest
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
    public function rules()
    {
        $videoId = $this->route('video');
        // যদি route হয়: /videos/{video}

        return [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('videos', 'title')->ignore($videoId),
            ],

            'description' => 'required|string',

            'thumbnail' => $videoId
                ? 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
                : 'required|image|mimes:jpeg,png,jpg,gif,svg',

            'video' => $videoId
                ? 'nullable|file|mimes:mp4,mov,avi,wmv,mkv'
                : 'required|file|mimes:mp4,mov,avi,wmv,mkv',
        ];
    }
}

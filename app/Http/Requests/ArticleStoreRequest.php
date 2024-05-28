<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'img' => 'required|image',
            'text' => 'required|string',
        ];
    }

    public function messages(): array 
    {
        return [
            'title.required' => 'il campo titolo è obbligatorio',
            'subtitle.required' => 'il campo sottotitolo è obbligatorio',
            'img.required' => 'il campo immage è obbligatorio',
            'text.required' => 'il campo corpo è obbligatorio',
            'title.string' => 'il campo titolo deve essere una stringa',
            'subtitle.string' => 'il campo sottotitolo deve essere una stringa',
            'img.image' => 'il campo immage deve essere un\'immagine',
            'text.string' => 'il campo corpo deve essere una stringa',
        ];
    }
}

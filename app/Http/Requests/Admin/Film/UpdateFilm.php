<?php namespace App\Http\Requests\Admin\Film;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateFilm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.film.edit', $this->film);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'title' => ['nullable', 'string'],
            'film_url' => ['nullable', 'string'],
            'slug' => ['sometimes', Rule::unique('films', 'slug')->ignore($this->film->getKey(), $this->film->getKeyName()), 'string'],
            'description' => ['nullable', 'string'],
            'rating' => ['nullable', 'integer'],
            'likes' => ['nullable', 'integer'],
            'year' => ['nullable', 'integer'],
            'enabled' => ['sometimes', 'integer'],
            'seo_keywords' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            
        ];
    }
}

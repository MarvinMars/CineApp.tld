<?php namespace App\Http\Requests\Admin\Film;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreFilm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.film.create');
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
            'slug' => ['required', Rule::unique('films', 'slug'), 'string'],
            'description' => ['nullable', 'string'],
            'rating' => ['nullable', 'integer'],
            'likes' => ['nullable', 'integer'],
            'year' => ['nullable', 'integer'],
            'enabled' => ['required', 'integer'],
            'seo_keywords' => ['nullable', 'string'],
            'seo_description' => ['nullable', 'string'],
            
        ];
    }
}

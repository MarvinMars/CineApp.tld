<?php namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.category.edit', $this->category);
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
            'slug' => ['sometimes', Rule::unique('categories', 'slug')->ignore($this->category->getKey(), $this->category->getKeyName()), 'string'],
            'description' => ['nullable', 'string'],
            
        ];
    }
}

<?php namespace App\Http\Requests\Admin\Comment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateComment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.comment.edit', $this->comment);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'content' => ['nullable', 'string'],
            'likes' => ['nullable', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'film_id' => ['nullable', 'integer'],
            'parent_id' => ['nullable', 'integer'],
            
        ];
    }
}

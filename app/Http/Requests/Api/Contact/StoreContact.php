<?php
namespace App\Http\Requests\Api\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreContact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'name' => [ 'string'],
            'email' => ['required', 'email', 'string'],
            'company' => ['required', 'string'],
            'project_details' => ['required', 'string'],
        ];
    }
}

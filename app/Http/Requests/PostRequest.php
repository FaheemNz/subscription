<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         =>  'required|string|max:255|unique:posts,title',
            'description'   =>  'required|regex:/^([a-zA-Z0-9\s\/&_\-\[\]\$,.!#)(\@\:]*)$/u'
        ];
    }
    
    public function messages()
    {
        return [
            'title.required'        =>      'Post Title is required',
            'title.string'          =>      'Post value must be a valid string',
            'title.max'             =>      'Post value is too long',
            'title.unique'          =>      'Title must be Unique',
            'description.required'  =>      'Description is required',
            'description.regex'     =>      'Description contains invalid Data'
        ];
    }
    
    /**
     * Customize Form Request Errors for a consistent API response
     */
    protected function failedValidation(Validator $validator)
    {
        if($this->expectsJson()){
            $errors = (new ValidationException($validator))->errors();
            
            throw new HttpResponseException(
                response()->json([
                    'success' => false,
                    'data'    => $errors,
                    'message' => 'Post Validation Error'
                ], 422)
            );
        }
        
        parent::failedValidation($validator);
    }
}

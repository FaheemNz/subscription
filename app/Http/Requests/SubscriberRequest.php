<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class SubscriberRequest extends FormRequest
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
            'subscriber_id'    =>      'required|integer|exists:subscribers,id'
        ];
    }
    
    public function messages()
    {
        return [
            'subscriber_id.required'   =>  'Subscriber ID is required',
            'subscriber_id.integer'    =>  'Subscriber ID must be numeric',
            'subscriber_id.exists'     =>  'Subscriber ID does not exist in our system'
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

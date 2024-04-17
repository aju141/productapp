<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_title' => 'required',
            'product_description'=>'required',
            'product_cat'=>'required',
            'product_link_url'=> 'required',
            'product_price' => 'required',
            'product_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}

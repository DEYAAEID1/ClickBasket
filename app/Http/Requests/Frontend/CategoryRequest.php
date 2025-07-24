<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'nullable|integer|min:1',
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'is_active' => 'required|boolean',
            'created_at' => 'nullable|datetime',
            'updated_at' => 'nullable|datetime',
            'deleted_at' => 'nullable|datetime',
            'created_by' => 'nullable|integer',
            'updated_by' => 'nullable|integer',
            'deleted_by' => 'nullable|integer',
            

        ];
    }
}

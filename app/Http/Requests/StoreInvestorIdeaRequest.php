<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Store Investor Idea Request
 *
 * Validates investor idea submission form
 * Implements ISP - specific validation interface for this use case
 */
class StoreInvestorIdeaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // Public form, anyone can submit
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            // Company Information
            'company_name' => ['required', 'string', 'max:255'],
            'contact_person' => ['required', 'string', 'max:255'],
            'position' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'website' => ['nullable', 'url', 'max:255'],

            // Project Information - Uzbek (required)
            'project_title_uz' => ['required', 'string', 'max:255'],
            'project_description_uz' => ['required', 'string', 'min:100'],

            // Project Information - Russian (required)
            'project_title_ru' => ['required', 'string', 'max:255'],
            'project_description_ru' => ['required', 'string', 'min:100'],

            // Project Information - English (optional)
            'project_title_en' => ['nullable', 'string', 'max:255'],
            'project_description_en' => ['nullable', 'string', 'min:100'],

            // Investment Details
            'estimated_investment' => ['nullable', 'numeric', 'min:0'],
            'currency' => ['nullable', 'string', 'in:USD,EUR,UZS,RUB'],
            'estimated_timeline_months' => ['nullable', 'integer', 'min:1', 'max:240'],
            'industry_sector' => ['nullable', 'string', 'max:255'],

            // Location
            'district_id' => ['nullable', 'integer', 'exists:districts,id'],
            'preferred_location' => ['nullable', 'string', 'max:255'],

            // Documents (max 10MB each)
            'business_plan_file' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
            'presentation_file' => ['nullable', 'file', 'mimes:pdf,ppt,pptx', 'max:10240'],
            'other_documents' => ['nullable', 'file', 'mimes:pdf,doc,docx,zip', 'max:10240'],
        ];
    }

    /**
     * Get custom attribute names
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'company_name' => __('Company Name'),
            'contact_person' => __('Contact Person'),
            'position' => __('Position'),
            'email' => __('Email Address'),
            'phone' => __('Phone Number'),
            'website' => __('Website'),
            'project_title_uz' => __('Project Title (Uzbek)'),
            'project_title_ru' => __('Project Title (Russian)'),
            'project_title_en' => __('Project Title (English)'),
            'project_description_uz' => __('Project Description (Uzbek)'),
            'project_description_ru' => __('Project Description (Russian)'),
            'project_description_en' => __('Project Description (English)'),
            'estimated_investment' => __('Estimated Investment'),
            'currency' => __('Currency'),
            'estimated_timeline_months' => __('Estimated Timeline'),
            'industry_sector' => __('Industry Sector'),
            'district_id' => __('District'),
            'preferred_location' => __('Preferred Location'),
            'business_plan_file' => __('Business Plan'),
            'presentation_file' => __('Presentation'),
            'other_documents' => __('Other Documents'),
        ];
    }

    /**
     * Get custom validation messages
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'project_description_uz.min' => __('Project description must be at least 100 characters in Uzbek.'),
            'project_description_ru.min' => __('Project description must be at least 100 characters in Russian.'),
            'project_description_en.min' => __('Project description must be at least 100 characters in English.'),
            'business_plan_file.max' => __('Business plan file must not exceed 10MB.'),
            'presentation_file.max' => __('Presentation file must not exceed 10MB.'),
            'other_documents.max' => __('Document file must not exceed 10MB.'),
        ];
    }
}

<?php

namespace App\DTOs;

/**
 * Investor Idea Data Transfer Object
 *
 * Encapsulates investor idea data for transfer between layers
 * Implements clean architecture separation
 */
class InvestorIdeaDTO
{
    public string $company_name;
    public string $contact_person;
    public ?string $position;
    public string $email;
    public string $phone;
    public ?string $website;

    public string $project_title_uz;
    public string $project_title_ru;
    public ?string $project_title_en;

    public string $project_description_uz;
    public string $project_description_ru;
    public ?string $project_description_en;

    public ?float $estimated_investment;
    public string $currency;
    public ?int $estimated_timeline_months;
    public ?string $industry_sector;

    public ?int $district_id;
    public ?string $preferred_location;

    public $business_plan_file;
    public $presentation_file;
    public $other_documents;

    /**
     * Create DTO from array
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        $dto = new self();

        $dto->company_name = $data['company_name'];
        $dto->contact_person = $data['contact_person'];
        $dto->position = $data['position'] ?? null;
        $dto->email = $data['email'];
        $dto->phone = $data['phone'];
        $dto->website = $data['website'] ?? null;

        $dto->project_title_uz = $data['project_title_uz'];
        $dto->project_title_ru = $data['project_title_ru'];
        $dto->project_title_en = $data['project_title_en'] ?? null;

        $dto->project_description_uz = $data['project_description_uz'];
        $dto->project_description_ru = $data['project_description_ru'];
        $dto->project_description_en = $data['project_description_en'] ?? null;

        $dto->estimated_investment = isset($data['estimated_investment']) ? (float) $data['estimated_investment'] : null;
        $dto->currency = $data['currency'] ?? 'USD';
        $dto->estimated_timeline_months = isset($data['estimated_timeline_months']) ? (int) $data['estimated_timeline_months'] : null;
        $dto->industry_sector = $data['industry_sector'] ?? null;

        $dto->district_id = isset($data['district_id']) ? (int) $data['district_id'] : null;
        $dto->preferred_location = $data['preferred_location'] ?? null;

        $dto->business_plan_file = $data['business_plan_file'] ?? null;
        $dto->presentation_file = $data['presentation_file'] ?? null;
        $dto->other_documents = $data['other_documents'] ?? null;

        return $dto;
    }

    /**
     * Convert DTO to array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'company_name' => $this->company_name,
            'contact_person' => $this->contact_person,
            'position' => $this->position,
            'email' => $this->email,
            'phone' => $this->phone,
            'website' => $this->website,
            'project_title_uz' => $this->project_title_uz,
            'project_title_ru' => $this->project_title_ru,
            'project_title_en' => $this->project_title_en,
            'project_description_uz' => $this->project_description_uz,
            'project_description_ru' => $this->project_description_ru,
            'project_description_en' => $this->project_description_en,
            'estimated_investment' => $this->estimated_investment,
            'currency' => $this->currency,
            'estimated_timeline_months' => $this->estimated_timeline_months,
            'industry_sector' => $this->industry_sector,
            'district_id' => $this->district_id,
            'preferred_location' => $this->preferred_location,
        ];
    }
}

<?php

namespace App\Enums;

enum ContactPreferenceEnum: int
{
    case EMAIL = 1;

    case PHONE_NUMBER = 2;

    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'name' => $this->getReadableName(),
        ];
    }

    public function getReadableName(): string
    {
        return match ($this) {
            ContactPreferenceEnum::EMAIL => 'Email',
            ContactPreferenceEnum::PHONE_NUMBER => 'Phone No',
        };
    }
}

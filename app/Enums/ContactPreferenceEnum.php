<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ContactPreferenceEnum: int implements HasLabel
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

    public function getLabel(): ?string
    {
        return match ($this) {
            self::EMAIL => 'Email',
            self::PHONE_NUMBER => 'Phone No',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            ContactPreferenceEnum::EMAIL => 'primary',
            ContactPreferenceEnum::PHONE_NUMBER => 'success',
        };
    }
}

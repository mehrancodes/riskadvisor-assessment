<?php

namespace App\Filament\Resources\ConsumerResource\Pages;

use App\Filament\Resources\ConsumerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

/**
 * @codeCoverageIgnoreStart
 */
class ListConsumers extends ListRecords
{
    protected static string $resource = ConsumerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

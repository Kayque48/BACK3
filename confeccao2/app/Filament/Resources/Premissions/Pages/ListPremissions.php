<?php

namespace App\Filament\Resources\Premissions\Pages;

use App\Filament\Resources\Premissions\PremissionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPremissions extends ListRecords
{
    protected static string $resource = PremissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

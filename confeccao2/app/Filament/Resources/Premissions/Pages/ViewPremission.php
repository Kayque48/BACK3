<?php

namespace App\Filament\Resources\Premissions\Pages;

use App\Filament\Resources\Premissions\PremissionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPremission extends ViewRecord
{
    protected static string $resource = PremissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

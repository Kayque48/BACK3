<?php

namespace App\Filament\Resources\Premissions\Pages;

use App\Filament\Resources\Premissions\PremissionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPremission extends EditRecord
{
    protected static string $resource = PremissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

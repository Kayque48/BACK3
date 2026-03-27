<?php

namespace App\Filament\Resources\Estoques\Pages;

use App\Filament\Resources\Estoques\EstoquesResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEstoques extends ViewRecord
{
    protected static string $resource = EstoquesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

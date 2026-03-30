<?php

namespace App\Filament\Resources\Premissions;

use App\Filament\Resources\Premissions\Pages\CreatePremission;
use App\Filament\Resources\Premissions\Pages\EditPremission;
use App\Filament\Resources\Premissions\Pages\ListPremissions;
use App\Filament\Resources\Premissions\Pages\ViewPremission;
use App\Filament\Resources\Premissions\Schemas\PremissionForm;
use App\Filament\Resources\Premissions\Schemas\PremissionInfolist;
use App\Filament\Resources\Premissions\Tables\PremissionsTable;
// use App\Models\Premission;
use Spatie\Permission\Models\Permission;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PremissionResource extends Resource
{
    protected static ?string $model = Premission::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Permission';

    public static function form(Schema $schema): Schema
    {
        return PremissionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PremissionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PremissionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPremissions::route('/'),
            'create' => CreatePremission::route('/create'),
            'view' => ViewPremission::route('/{record}'),
            'edit' => EditPremission::route('/{record}/edit'),
        ];
    }
}

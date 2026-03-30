<?php

namespace App\Filament\Resources\Roles;

use App\Filament\Resources\Roles\Pages\CreateRole;
use App\Filament\Resources\Roles\Pages\EditRole;
use App\Filament\Resources\Roles\Pages\ListRoles;
use App\Filament\Resources\Roles\Pages\ViewRole;
use App\Filament\Resources\Roles\Schemas\RoleForm;
use App\Filament\Resources\Roles\Schemas\RoleInfolist;
use App\Filament\Resources\Roles\Tables\RolesTable;
// use App\Models\Role;
use Spatie\Permission\Models\Role;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;


    protected static function canAcess(): bool
    {
        // return auth()->user()?->hasRole('Admin') ?? false;
        // return auth()->user()?->can('acessar_cliente') ?? false;
        return auth()->user()?->can('acessar_clientes') ?? false;
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

      public static function getLabel(): ?string
    {
        return 'Função';
    }

    public static function getPluralLabel(): ?string
    {
        return 'Cargos e Funções';
    }

    public static function getCreateFormHeading(): string
    {
        return 'Criar função';
    }

    public static function getEditFormHeading(): string
    {
        return 'Editar função';
    }

    public static function form(Schema $schema): Schema
    {
        // return RoleForm::configure($schema);
        return $schema
        ->components([
          Select::make('permissions')
                ->label('Permissões de Acesso')
                ->multiple()
                ->relationship('permissions', 'name')
                ->preload()
                ->columnSpanFull(),

            TextInput::make('name')
            ->label('Liberação de Menu')
            ->required(),
        ]);
        
    }

    public static function infolist(Schema $schema): Schema
    {
        return RoleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        // return RolesTable::configure($table);
        return $table
        ->columns([
            TextColumn::make('name')->label('Nome do Cargo/Função')->sortable()->searchable(),
            TextColumn::make('guard_name')->label('Sigla do Cargo/Função')->sortable()->searchable(),
            TextColumn::make('permissions_count')->label('Permissões de Acesso')->counts('permissions')->sortable(),
        ]);
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
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'view' => ViewRole::route('/{record}'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}

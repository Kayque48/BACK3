<?php

namespace App\Filament\Resources\Fornecedors;

use App\Filament\Resources\Fornecedors\Pages\CreateFornecedor;
use App\Filament\Resources\Fornecedors\Pages\EditFornecedor;
use App\Filament\Resources\Fornecedors\Pages\ListFornecedors;
use App\Filament\Resources\Fornecedors\Pages\ViewFornecedor;
use App\Filament\Resources\Fornecedors\Schemas\FornecedorForm;
use App\Filament\Resources\Fornecedors\Schemas\FornecedorInfolist;
use App\Filament\Resources\Fornecedors\Tables\FornecedorsTable;
use App\Models\Fornecedor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Support\RawJs;

class FornecedorResource extends Resource
{
    protected static ?string $model = Fornecedor::class;

     public static function canAccess(): bool
    {
        return auth()->user()?->hasRole('RH') ?? false;
    }


    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Fornecedor';

    public static function form(Schema $schema): Schema
    {
        // return FornecedorForm::configure($schema);
        return $schema
            ->components([
                TextInput::make('nome')->required()->label('Nome Completo'),
                TextInput::make('nome_fantasia')->label('Nome Fantasia(opcional)'),
                TextInput::make('email')->required()->email()->label('Email'),
                textInput::make('telefone')->tel()->label('Telefone')->mask('(99) 99999-9999'),
                TextInput::make('documento')->label('CPF ou CNPJ')->mask(RawJs::make(<<<'JS'
                $input.length > 14 ? '99.999.999/9999-99' : '99.999.999-999.99' 
                JS)),

            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return FornecedorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                textColumn::make('nome')->label('Nome Completo')->searchable()->sortable(),
                textColumn::make('nome_fantasia')->label('Nome Fantasia')->searchable()->sortable(),
                textColumn::make('email')->label('Email')->searchable()->sortable(),
                textColumn::make('telefone')->label('Telefone')->searchable()->sortable(),
                textColumn::make('documento')->label('CPF ou CNPJ')->searchable()->sortable(),
            ])
            ->recordActions([
                ViewAction::make()->label('Visualizar'),
                EditAction::make()->label('Editar'),
            ]);
        // return FornecedorsTable::configure($table);
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
            'index' => ListFornecedors::route('/'),
            'create' => CreateFornecedor::route('/create'),
            'view' => ViewFornecedor::route('/{record}'),
            'edit' => EditFornecedor::route('/{record}/edit'),
        ];
    }
}

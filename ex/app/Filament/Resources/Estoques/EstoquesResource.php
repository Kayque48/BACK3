<?php

namespace App\Filament\Resources\Estoques;

use App\Filament\Resources\Estoques\Pages\CreateEstoques;
use App\Filament\Resources\Estoques\Pages\EditEstoques;
use App\Filament\Resources\Estoques\Pages\ListEstoques;
use App\Filament\Resources\Estoques\Pages\ViewEstoques;
use App\Filament\Resources\Estoques\Schemas\EstoquesForm;
use App\Filament\Resources\Estoques\Schemas\EstoquesInfolist;
use App\Filament\Resources\Estoques\Tables\EstoquesTable;
use App\Models\Estoques;
use UnitEnum;
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

class EstoquesResource extends Resource
{
    protected static ?string $model = Estoques::class;

    protected static string|UnitEnum|null $navigationGroup = 'Controle de Estoque';
    protected static ?int $navigationSort = 3;

     public static function canAccess(): bool
    {
        return auth()->user()?->hasRole('Gerente') ?? false;
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Estoques';

    public static function form(Schema $schema): Schema
    {
        // return EstoquesForm::configure($schema);
        return $schema
            ->components([
                Select::make('produto_id')
                    ->relationship('produto', 'nome')
                    ->required()
                        ->searchable()
                        ->preload()
                        ->required()
                        ->label('Selecione o Produto'),

                Select::make('tipo')
                    ->options([
                        'entrada' => 'Entrada',
                        'saida' => 'Saída',
                    ])
                    ->required()
                    ->label('Selecione o Tipo'),

                TextInput::make('quantidade')->numeric()->required()->label('Quantidade'),
                TextInput::make('observacao')->label('Observação'),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EstoquesInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        // return EstoquesTable::configure($table);
        return $table
            ->columns([
                TextColumn::make('produto.nome')->label('Produto')->searchable()->sortable(),
                TextColumn::make('tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'entrada' => 'success',
                        'saida' => 'danger',
                        default => 'primary',
                    }),
                TextColumn::make('quantidade')->label('Quantidade')->sortable(),
                TextColumn::make('observacao')->label('Observação')->searchable()->sortable(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
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
            'index' => ListEstoques::route('/'),
            'create' => CreateEstoques::route('/create'),
            'view' => ViewEstoques::route('/{record}'),
            'edit' => EditEstoques::route('/{record}/edit'),
        ];
    }
}

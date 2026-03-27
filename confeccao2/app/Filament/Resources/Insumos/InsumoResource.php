<?php

namespace App\Filament\Resources\Insumos;

use App\Filament\Resources\Insumos\Pages\CreateInsumo;
use App\Filament\Resources\Insumos\Pages\EditInsumo;
use App\Filament\Resources\Insumos\Pages\ListInsumos;
use App\Filament\Resources\Insumos\Pages\ViewInsumo;
use App\Filament\Resources\Insumos\Schemas\InsumoForm;
use App\Filament\Resources\Insumos\Schemas\InsumoInfolist;
use App\Filament\Resources\Insumos\Tables\InsumosTable;
use App\Models\Insumo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Support\RawJs;

class InsumoResource extends Resource
{
    protected static ?string $model = Insumo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Insumo';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nome')->required()->label('Nome do Insumo'),
                Select::make('unidade_medida')
                    ->label('Unidade de Medida')
                    ->required()
                    ->searchable() // Recomendado, já que a lista ficou grande
                    ->options([
                        'Massa/Peso' => [
                            'kg' => 'Quilograma (kg)',
                            'g'  => 'Grama (g)',
                            'mg' => 'Miligrama (mg)',
                            'ton' => 'Tonelada (t)',
                        ],
                        'Volume/Líquidos' => [
                            'l'  => 'Litro (l)',
                            'ml' => 'Mililitro (ml)',
                            'm3' => 'Metro Cúbico (m³)',
                        ],
                        'Quantitativo/Unidades' => [
                            'un'  => 'Unidade (un)',
                            'pc'  => 'Peça (pç)',
                            'cj'  => 'Conjunto (cj)',
                            'dz'  => 'Dúzia (dz)',
                            'par' => 'Par',
                        ],
                        'Embalagens Coletivas' => [
                            'cx'  => 'Caixa (cx)',
                            'fd'  => 'Fardo (fd)',
                            'pt'  => 'Pacote (pt)',
                            'gl'  => 'Galão (gl)',
                            'lt'  => 'Lata (lt)',
                            'sc'  => 'Saco (sc)',
                            'bd'  => 'Balde (bd)',
                            'rl'  => 'Rolo (rl)',
                        ],
                        'Comprimento/Área' => [
                            'm'  => 'Metro (m)',
                            'cm' => 'Centímetro (cm)',
                            'mm' => 'Milímetro (mm)',
                            'm2' => 'Metro Quadrado (m²)',
                        ],
                    ]),
                TextInput::make('preco')->numeric()->label('Preço')->prefix('R$ ')->mask(RawJs::make(<<<'JS'
                    $input->format('0,0.00')
                JS)),
                TextInput::make('estoque')->numeric()->label('Estoque'),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return InsumoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')->label('Nome do Insumo')->searchable()->sortable(),
                TextColumn::make('unidade_medida')->label('Unidade de Medida')->searchable()->sortable(),
                TextColumn::make('preco')->label('Preço')->money('BRL', true)->sortable(),
                TextColumn::make('estoque')->label('Estoque')->sortable(),
            ])
            ->recordActions([
                ViewAction::make()->label('Visualizar'),
                EditAction::make()->label('Editar'),
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
            'index' => ListInsumos::route('/'),
            'create' => CreateInsumo::route('/create'),
            'view' => ViewInsumo::route('/{record}'),
            'edit' => EditInsumo::route('/{record}/edit'),
        ];
    }
}

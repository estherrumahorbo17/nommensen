<?php

namespace App\Filament\Resources\Greetings;

use App\Filament\Resources\Greetings\Pages\CreateGreeting;
use App\Filament\Resources\Greetings\Pages\EditGreeting;
use App\Filament\Resources\Greetings\Pages\ListGreetings;
use App\Filament\Resources\Greetings\Schemas\GreetingForm;
use App\Filament\Resources\Greetings\Tables\GreetingsTable;
use App\Models\Greeting;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GreetingResource extends Resource
{
    protected static ?string $model = Greeting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static UnitEnum|string|null $navigationGroup = 'Manajemen Konten';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = 'Sambutan';

    protected static ?string $recordTitleAttribute = 'Greeting';

    public static function form(Schema $schema): Schema
    {
        return GreetingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GreetingsTable::configure($table);
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
            'index' => ListGreetings::route('/'),
            'create' => CreateGreeting::route('/create'),
            'edit' => EditGreeting::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\Rektors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RektorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('jabatan')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->directory('rektors')
                    ->maxSize(2048)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}

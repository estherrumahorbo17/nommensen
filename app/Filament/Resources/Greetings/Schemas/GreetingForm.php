<?php

namespace App\Filament\Resources\Greetings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class GreetingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                RichEditor::make('content')
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'h2',
                        'h3',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->directory('greetings')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}

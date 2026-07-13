<?php

namespace App\Filament\Resources\Footers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FooterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Logo & Identitas')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Logo Universitas')
                            ->image()
                            ->directory('footers')
                            ->visibility('public')
                            ->imagePreviewHeight('150')
                            ->maxSize(2048)
                            ->required()
                            ->helperText('Upload logo universitas. Format: JPG, PNG. Maks 2MB.')
                            ->columnSpanFull(),

                        TextInput::make('alamat')
                            ->label('Alamat')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('wa')
                            ->label('WhatsApp')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Section::make('Media Sosial')
                    ->schema([
                        TextInput::make('link_instagram')
                            ->label('Instagram')
                            ->url()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('https://instagram.com/...'),

                        TextInput::make('link_youtube')
                            ->label('YouTube')
                            ->url()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('https://youtube.com/...'),

                        TextInput::make('link_linkedin')
                            ->label('LinkedIn')
                            ->url()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('https://linkedin.com/...'),

                        TextInput::make('link_facebook')
                            ->label('Facebook')
                            ->url()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('https://facebook.com/...'),
                    ])
                    ->columns(2),

                Section::make('Lokasi')
                    ->schema([
                        TextInput::make('link_gmaps')
                            ->label('Link Google Maps')
                            ->url()
                            ->required()
                            ->maxLength(255)
                            ->placeholder('https://maps.google.com/...')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('namalengkap')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: Muhammad Rizky Pratama'),

                TextInput::make('namapanggilan')
                    ->label('Nama Panggilan')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: Rizky'),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: rizky.pratama@gmail.com'),

                TextInput::make('nomor_hp')
                    ->label('Nomor HP')
                    ->required()
                    ->maxLength(15)
                    ->placeholder('contoh: 08123456789')
                    ->helperText('Maksimal 15 digit, format 08xxxxxxxxxx.'),

                Select::make('jalur')
                    ->label('Jalur Masuk')
                    ->options([
                        'Reguler' => 'Reguler',
                        'Beasiswa' => 'Beasiswa',
                        'Transfer' => 'Transfer',
                    ])
                    ->required(),

                FileUpload::make('image')
                    ->label('Foto Mahasiswa')
                    ->image()
                    ->disk('public')
                    ->directory('students')
                    ->imagePreviewHeight('150')
                    ->maxSize(2048)
                    ->required()
                    ->helperText('Format: JPG, PNG. Maks 2MB.')
                    ->columnSpanFull(),

                TextInput::make('programstudi_1')
                    ->label('Program Studi Pilihan 1')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: Teknik Informatika'),

                TextInput::make('programstudi_2')
                    ->label('Program Studi Pilihan 2')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('contoh: Sistem Informasi'),
            ]);
    }
}

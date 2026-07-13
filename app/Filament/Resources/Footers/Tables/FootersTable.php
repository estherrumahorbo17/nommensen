<?php

namespace App\Filament\Resources\Footers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FootersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public')
                    ->height(60)
                    ->circular(),
                TextColumn::make('link_instagram')
                    ->label('Instagram')
                    ->searchable()
                    ->url(fn ($state) => $state)
                    ->openUrlInNewTab(),
                TextColumn::make('link_youtube')
                    ->label('YouTube')
                    ->searchable()
                    ->url(fn ($state) => $state)
                    ->openUrlInNewTab(),
                TextColumn::make('link_linkedin')
                    ->label('LinkedIn')
                    ->searchable()
                    ->url(fn ($state) => $state)
                    ->openUrlInNewTab(),
                TextColumn::make('link_facebook')
                    ->label('Facebook')
                    ->searchable()
                    ->url(fn ($state) => $state)
                    ->openUrlInNewTab(),
                TextColumn::make('alamat')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable()
                    ->url(fn ($state) => $state ? "mailto:{$state}" : null),
                TextColumn::make('wa')
                    ->searchable()
                    ->url(fn ($state) => $state ? "https://wa.me/" . (str_starts_with($phone = preg_replace('/\D/', '', $state), '0') ? '62' . substr($phone, 1) : $phone) : null)
                    ->openUrlInNewTab(),
                TextColumn::make('link_gmaps')
                    ->label('Google Maps')
                    ->searchable()
                    ->url(fn ($state) => $state)
                    ->openUrlInNewTab(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

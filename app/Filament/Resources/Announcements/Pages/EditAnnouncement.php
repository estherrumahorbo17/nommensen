<?php

namespace App\Filament\Resources\Announcements\Pages;

use App\Filament\Resources\Announcements\AnnouncementResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

class EditAnnouncement extends EditRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\DeleteAction::make(),
        ];
    }

    /**
     * (Opsional) Regenerasi slug saat judul diubah.
     * Konsekuensi: URL lama tidak berlaku lagi.
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['slug'] = Str::slug($data['title']) . '-' . time();

        return $data;
    }
}
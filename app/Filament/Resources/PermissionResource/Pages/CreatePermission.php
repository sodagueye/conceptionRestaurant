<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use App\Filament\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;


class CreatePermission extends CreateRecord
{
    protected static string $resource = PermissionResource::class;
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}

 protected function getCreatedNotification(): ?Notification
    {
        return null;
    }
 protected function afterCreate(): void
    {
        Notification::make()
            ->title('Permission créée avec succès')
            ->success()
            ->send();
    }
}

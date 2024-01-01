<?php

namespace App\Filament\Resources\UtudeReivewResource\Pages;

use App\Filament\Resources\UtudeReivewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUtudeReivew extends EditRecord
{
    protected static string $resource = UtudeReivewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

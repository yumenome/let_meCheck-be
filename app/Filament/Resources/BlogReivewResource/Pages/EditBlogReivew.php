<?php

namespace App\Filament\Resources\BlogReivewResource\Pages;

use App\Filament\Resources\BlogReivewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogReivew extends EditRecord
{
    protected static string $resource = BlogReivewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

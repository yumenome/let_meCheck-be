<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UtudeReivewResource\Pages;
use App\Filament\Resources\UtudeReivewResource\RelationManagers;
use App\Models\Phone;
use App\Models\UtudeReivew;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UtudeReivewResource extends Resource
{
    protected static ?string $model = UtudeReivew::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('phone_id')->label('phone name')
                ->options(Phone::all()->pluck('name', 'id')),
                TextInput::make('channelName'),
                TextInput::make('utude_link')->columnSpanFull(),
                FileUpload::make('thumbnail')->disk('public')->directory('Utude_thumbnails')
                                             ->image()->imageEditor()->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('phone.name'),
                TextColumn::make('utude_link'),
                ImageColumn::make('thumbnail'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListUtudeReivews::route('/'),
            'create' => Pages\CreateUtudeReivew::route('/create'),
            'edit' => Pages\EditUtudeReivew::route('/{record}/edit'),
        ];
    }
}

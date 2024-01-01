<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhoneResource\Pages;
use App\Filament\Resources\PhoneResource\RelationManagers;
use App\Models\Brands;
use App\Models\Phone;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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

class PhoneResource extends Resource
{
    protected static ?string $model = Phone::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Fieldset::make('Infos')
                    ->schema([
                        TextInput::make('name'),
                        Select::make('brand_id')->label('Brands')
                        ->options(Brands::all()->pluck('title', 'id')),
                        TextInput::make('launch'),
                        TextInput::make('os'),
                        TextInput::make('cpu'),
                        TextInput::make('gpu'),
                        TextInput::make('ram'),
                        TextInput::make('storage'),
                        TextInput::make('size')->label('Display Size'),
                        TextInput::make('camera'),
                        TextInput::make('speaker'),
                        TextInput::make('battery'),
                        Select::make('color')
                        ->options([
                            'royal' => 'royal',
                            'natural' => 'natural',
                            'classical' => 'classical',
                        ]),
                    ]),

                Fieldset::make('Images')
                    ->schema([
                        FileUpload::make('phone_img')->image()->imageEditor()
                        ->disk('public')->directory('phone_images'),
                        FileUpload::make('phones_img')->image()->imageEditor()
                                        ->disk('public')->directory('phones_images'),
                    ]),



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('brand.title')->sortable(),

                TextColumn::make('color'),
                ImageColumn::make('phone_img'),
                ImageColumn::make('phones_img'),

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
            'index' => Pages\ListPhones::route('/'),
            'create' => Pages\CreatePhone::route('/create'),
            'edit' => Pages\EditPhone::route('/{record}/edit'),
        ];
    }
}

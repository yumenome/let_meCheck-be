<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConclusionResource\Pages;
use App\Filament\Resources\ConclusionResource\RelationManagers;
use App\Models\Conclusion;
use App\Models\Phone;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConclusionResource extends Resource
{
    protected static ?string $model = Conclusion::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('phone_id')->label('phone name')
                ->options(Phone::all()->pluck('name', 'id')),
                FileUpload::make('conclusion_img')->disk('public')->directory('conclusion_images')
                                             ->image()->imageEditor(),
                MarkdownEditor::make('content')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('phone.name'),
                ImageColumn::make('conclusion_img')->label('Conclusion Image'),
                TextColumn::make('content')
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
            'index' => Pages\ListConclusions::route('/'),
            'create' => Pages\CreateConclusion::route('/create'),
            'edit' => Pages\EditConclusion::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogReivewResource\Pages;
use App\Filament\Resources\BlogReivewResource\RelationManagers;
use App\Models\BlogReivew;
use App\Models\Phone;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BlogReivewResource extends Resource
{
    protected static ?string $model = BlogReivew::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('phone_id')->label('phone name')
                    ->options(Phone::all()->pluck('name', 'id')),
                TextInput::make('source'),
                TextInput::make('blog_link')->columnSpanFull(),
                MarkdownEditor::make('intro')->columnSpanFull(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('phone.name'),
                TextColumn::make('source'),
                TextColumn::make('intro'),
                TextColumn::make('blog_link'),

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
            'index' => Pages\ListBlogReivews::route('/'),
            'create' => Pages\CreateBlogReivew::route('/create'),
            'edit' => Pages\EditBlogReivew::route('/{record}/edit'),
        ];
    }
}

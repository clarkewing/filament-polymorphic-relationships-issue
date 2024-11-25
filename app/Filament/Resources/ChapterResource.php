<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChapterResource\Pages;
use App\Models\Chapter;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ChapterResource extends Resource
{
    protected static ?string $model = Chapter::class;

    protected static ?string $slug = 'chapters';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),
            Group::make()
                ->relationship('content')
                ->schema([
                    Repeater::make('tracks')
                        ->relationship('tracks')
                        ->schema([
                            TextInput::make('transcript')->required(),
                        ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChapters::route('/'),
            'create' => Pages\CreateChapter::route('/create'),
            'edit' => Pages\EditChapter::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [];
    }
}

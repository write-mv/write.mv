<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentsResource\Pages;
use App\Models\Comment;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;

class CommentsResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-annotation';

    protected static ?string $navigationGroup = 'Blog Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComments::route('/create'),
            'edit' => Pages\EditComments::route('/{record}/edit'),
        ];
    }
}

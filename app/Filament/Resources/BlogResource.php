<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\BooleanColumn;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                TextColumn::make('name')->sortable()->searchable()
                    ->url(fn (Blog $record): string => route('domain.posts.index', ['name' => $record->name]))
                    ->openUrlInNewTab(),
                TextColumn::make('site_title')->searchable(),
                TextColumn::make('team.name')->searchable(),
                TextColumn::make('created_at')->dateTime()
            ])
            ->filters([
                Tables\Filters\Filter::make('blocked')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('blocked_at')),
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
            'index' => Pages\ListBlogs::route('/'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes();
    }
}

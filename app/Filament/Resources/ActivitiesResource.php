<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivitiesResource\Pages;
use App\Models\WriteMvActivity;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class ActivitiesResource extends Resource
{
    protected static ?string $model = WriteMvActivity::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $label = 'Activity';

    protected static ?string $navigationGroup = 'Control Panel';

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
                TextColumn::make('description')->searchable(),
                TextColumn::make('subject_type')->searchable(),
                TextColumn::make('subject_id')->searchable(),
                TextColumn::make('created_at')->searchable()->label('Occured At'),
                TextColumn::make('activity_causer.name')->searchable()->label('Activity By'),
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
            'index' => Pages\ListActivities::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes()->whereNotNull('causer_type');
    }
}

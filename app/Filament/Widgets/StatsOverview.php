<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Publications', Post::withoutGlobalScopes()->count())->description(Post::withoutGlobalScopes()->whereDate('published_date', Carbon::today())->count() . ' publications today.')
                ->descriptionColor('success'),
            Card::make('Total Blogs', Blog::withoutGlobalScopes()->count()),
            Card::make('Total Users', User::withoutGlobalScopes()->count()),
            Card::make('Blog with highest post', Blog::withoutGlobalScopes()->orderByViews()->first()->name),
            Card::make('Blocked Blogs', Blog::withoutGlobalScopes()->whereNotNull('blocked_at')->count()),
        ];
    }
}

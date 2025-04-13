<?php

namespace App\Filament\Widgets;

use App\Models\Task;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    /**
     * @return array|Stat[]
     */
    protected function getStats(): array
    {
        $totalTasks = Task::query()->count();

        return [
            Stat::make('Users', User::query()->count())
                ->description('All users including admins')
                ->descriptionIcon('heroicon-m-users'),
            Stat::make('Total Tasks', $totalTasks)
                ->description('Total Tasks of all users')
                ->descriptionIcon('heroicon-m-clipboard-document-list'),
        ];
    }
}

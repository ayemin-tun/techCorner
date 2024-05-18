<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStatus;
use App\Models\Order;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            OrderStatus::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All')
                ->badge(Order::query()->count()),
            'New' => Tab::make()->query(fn ($query) => $query->where('status', 'new'))
                ->badge(Order::query()->where('status', 'new')->count())
                ->icon('heroicon-m-sparkles'),
            'Processing' => Tab::make()->query(fn ($query) => $query->where('status', 'processing'))
                ->badge(Order::query()->where('status', 'processing')->count())
                ->icon('heroicon-m-arrow-path'),
            'Shipped' => Tab::make()->query(fn ($query) => $query->where('status', 'shipped'))
                ->badge(Order::query()->where('status', 'shipped')->count())
                ->icon('heroicon-m-truck'),
            'Delivered' => Tab::make()->query(fn ($query) => $query->where('status', 'delivered'))
                ->badge(Order::query()->where('status', 'delivered')->count())
                ->icon('heroicon-m-check-badge'),
            'Cancelled' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled'))
                ->badge(Order::query()->where('status', 'cancelled')->count())
                ->icon('heroicon-m-x-circle'),
        ];
    }
}

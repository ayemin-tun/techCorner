<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrderStatus;
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
            null => Tab::make('All'),
            'New' => Tab::make()->query(fn ($query) => $query->where('status', 'new'))
                ->icon('heroicon-m-sparkles'),
            'Processing' => Tab::make()->query(fn ($query) => $query->where('status', 'processing'))
                ->icon('heroicon-m-arrow-path'),
            'Shipped' => Tab::make()->query(fn ($query) => $query->where('status', 'shipped'))
                ->icon('heroicon-m-truck'),
            'Delivered' => Tab::make()->query(fn ($query) => $query->where('status', 'delivered'))
                ->icon('heroicon-m-check-badge'),
            'Cancelled' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled'))
                ->icon('heroicon-m-x-circle'),
        ];
    }
}

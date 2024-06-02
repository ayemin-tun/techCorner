<?php

namespace App\Infolists\Components;

use Filament\Infolists\Components\Entry;

class RatingStarEntry extends Entry
{
    protected string $view = 'infolists.components.rating-star-entry';

    public string $size = 'sm';

    public function size(string $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function mount(): void
    {
        $this->size = 'sm';
    }
}

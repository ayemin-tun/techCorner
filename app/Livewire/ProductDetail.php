<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        return view('livewire.product-detail', [
            'product' => Product::where('slug', $this->slug)->first()
        ]);
    }
}

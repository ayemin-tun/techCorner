<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProductDetail extends Component
{
    use LivewireAlert;
    public $slug;

    public $quantity = 1;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function decreaseQty()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }
    public function increaseQty()
    {
        $this->quantity++;
    }

    public function addToCart($product_id)
    {
        $total_cont = CartManagement::addItemToCart($product_id);
        $this->dispatch('update-cart-count', total_count: $total_cont)->to(Navbar::class);

        $this->alert('success', 'Product added to the cart successfully!', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }


    public function render()
    {
        return view('livewire.product-detail', [
            'product' => Product::where('slug', $this->slug)->first()
        ]);
    }
}

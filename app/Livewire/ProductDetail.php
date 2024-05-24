<?php

namespace App\Livewire;

use App\Helpers\Alert;
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
        $total_cont = CartManagement::addItemToCartWithQty($product_id, $this->quantity);
        $this->dispatch('update-cart-count', total_count: $total_cont)->to(Navbar::class);
        Alert::message('success', 'Product added to the cart successfully', $this);
        $this->quantity = 1;
    }


    public function render()
    {
        return view('livewire.product-detail', [
            'product' => Product::where('slug', $this->slug)->first()
        ]);
    }
}

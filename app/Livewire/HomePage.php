<?php

namespace App\Livewire;

use App\Helpers\Alert;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('TechCorner | Home')]
class HomePage extends Component
{
    use LivewireAlert;

    public $reviews;

    public function mount()
    {
        $this->refreshReviews();
    }

    public function addToCart($product_id)
    {
        $total_cont = CartManagement::addItemToCart($product_id);
        $this->dispatch('update-cart-count', total_count: $total_cont)->to(Navbar::class);
        Alert::message('success', 'Product added to the cart successfully', $this);
    }

    #[On('update_review')]
    public function refreshReviews()
    {
        $this->reviews = Review::latest()->take(4)->get();
    }

    public function render()
    {
        $latest_products = Product::latest()->take(10)->get();
        $brands = Brand::where('is_active', 1)->get();
        $categories = Category::where('is_active', 1)->get();
        $reviews = Review::latest()->take(4)->get();

        return view('livewire.home-page', [
            'latest_products' => $latest_products,
            'brands' => $brands,
            'categories' => $categories,
            'reviews' => $reviews,
        ]);
    }
}

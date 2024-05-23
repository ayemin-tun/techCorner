<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product as ModelsProduct;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination, LivewireAlert;
    #[Url]
    public $selected_categories = [];
    #[Url]
    public $selected_brands = [];

    #[Url]
    public $featured;

    #[Url]
    public $on_sale;

    #[Url]
    public $price_range = 5000;

    #[Url]
    public $sort = 'latest';

    public $search = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }

    // add product to cart
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

    #[Title('TechCorner | Products')]
    public function render()
    {
        $products = ModelsProduct::query()->where('is_active', 1);
        if (!empty($this->selected_categories)) {
            $products->whereIn('category_id', $this->selected_categories);
        }
        if (!empty($this->selected_brands)) {
            $products->whereIn('brand_id', $this->selected_brands);
        }
        if ($this->featured) {
            $products->where('is_featured', 1);
        }
        if ($this->on_sale) {
            $products->where('on_sale', 1);
        }
        if ($this->price_range) {
            $products->whereBetween('price', [0, $this->price_range]);
        }
        if ($this->search) {
            $products->where('name', 'like', '%' . $this->search . '%');
        }
        if ($this->sort === 'latest') {
            $products->latest();
        }
        if ($this->sort === 'price') {
            $products->orderBy('price');
        }

        return view('livewire.product', [
            'products' => $products->paginate(6),
            'brands' => Brand::where('is_active', 1)->get(['id', 'name', 'slug']),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product as ModelsProduct;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
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

        return view('livewire.product', [
            'products' => $products->paginate(6),
            'brands' => Brand::where('is_active', 1)->get(['id', 'name', 'slug']),
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Category as ModelsCategory;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }

    #[Title("TechCorner | Catgories")]
    public function render()
    {
        $categories = ModelsCategory::where('is_active', 1)
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(6);

        // dd($categories);

        return view('livewire.category', ['categories' => $categories]);
    }
}

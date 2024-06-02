<?php

namespace App\Livewire;

use App\Models\Review as ModelsReview;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('TechCorner | Review')]
class Review extends Component
{
    use WithPagination;

    #[On('update_review')]
    public function render()
    {
        // Paginate the reviews with 4 reviews per page
        $reviews = ModelsReview::where('user_id', '!=', auth()->id())->latest()->paginate(4);
        $authUser_review = ModelsReview::where('user_id', auth()->id())->first();
        // dd($reviews);

        return view('livewire.review', [
            'reviews' => $reviews,
            'authUser_review' => $authUser_review,
        ]);
    }
}

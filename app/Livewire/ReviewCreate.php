<?php

namespace App\Livewire;

use App\Helpers\Alert;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('TechCorner | Create Review')]
class ReviewCreate extends Component
{
    use LivewireAlert;

    public $rating = 1;

    public $review;

    public function mount()
    {
        $existingReview = Review::where('user_id', Auth::id())->first();
        if ($existingReview) {
            return redirect('/review'); // Adjust this route name as needed
        }
    }

    public function save()
    {
        $this->validate([
            'review' => 'required|string|min:5|max:1000',
        ]);
        $review = Review::create([
            'user_id' => auth()->id(),
            'rating' => $this->rating,
            'review' => $this->review,
        ]);
        Alert::message('success', 'Your Review is created successfully', $this);

        return redirect('/review');
    }

    public function render()
    {
        return view('livewire.review-create');
    }
}

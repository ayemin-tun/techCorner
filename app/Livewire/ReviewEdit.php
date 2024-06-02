<?php

namespace App\Livewire;

use App\Helpers\Alert;
use App\Models\Review;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\Component;

class ReviewEdit extends Component
{
    use LivewireAlert;

    #[Url]
    public $review_id;

    public $rating;

    public $review;

    public function mount($review_id)
    {
        $this->review_id = $review_id;
        $review = Review::find($this->review_id);
        $this->rating = $review->rating;
        $this->review = $review->review;
    }

    public function edit()
    {
        $this->validate([
            'rating' => 'required',
            'review' => 'required',
        ]);
        $review = Review::find($this->review_id);
        $review->rating = $this->rating;
        $review->review = $this->review;
        $review->save();
        Alert::message('success', 'Review edited successfully', $this);

        return redirect('/review');
    }

    public function render()
    {
        return view('livewire.review-edit');
    }
}

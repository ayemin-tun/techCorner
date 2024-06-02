<?php

namespace App\Livewire\Review;

use App\Helpers\Alert;
use App\Livewire\HomePage;
use App\Livewire\Review as LivewireReview;
use App\Models\Review;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ReviewCard extends Component
{
    use LivewireAlert;

    public $review;

    public function mount($review)
    {
        $this->review = $review;
    }

    public function deleteReview($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->delete();
            Alert::message('success', 'Review Successfully deleted', $this);
            $this->dispatch('update_review')->to(LivewireReview::class);
            $this->dispatch('update_review')->to(HomePage::class);
        } else {
            Alert::message('error', 'some thing want wrong', $this);
        }
    }

    public function render()
    {
        $user = User::where('id', $this->review->user_id)->first();

        return view('livewire.components.review-card', [
            'user' => $user,
        ]);
    }
}

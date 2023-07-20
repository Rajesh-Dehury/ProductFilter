<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Livewire\Component;

class PostList extends Component
{
    protected $listeners = ['dateRange' => 'dateRange'];
    public $categories;
    public $subCategories;

    public $startDate;
    public $endDate;
    public $category_id;
    public $sub_cat_id;
    public $guest_count;

    private $post;
    public $perPage;

    public function mount()
    {
        $this->categories = Category::all();
        $this->subCategories = SubCategory::all();
        $this->post = Post::query()->paginate(12);
        $this->perPage = 12;
    }

    public function dateRange($start, $end)
    {
        $this->startDate = $start;
        $this->endDate = $end;
        $this->updated();
    }

    public function updated()
    {
        $this->post = Post::query()->with('category', 'subCategory');

        if ($this->startDate && $this->endDate) {
            $this->post->whereDate('start_date', '>=', $this->startDate)
                ->whereDate('end_date', '<=', $this->endDate);
        }

        if ($this->category_id) {
            $this->post->where('category_id', $this->category_id);
        }

        if ($this->sub_cat_id) {
            $this->post->where('sub_category_id', $this->sub_cat_id);
        }

        if ($this->guest_count) {
            $this->post->where('guests_allowed', '>=', $this->guest_count);
        }

        $this->post = $this->post->paginate($this->perPage);
    }
    public function loadMore()
    {
        $this->perPage += 8;
        $this->updated();
    }

    public function render()
    {

        return view('livewire.post-list', ['filteredPost' => $this->post]);
    }
}

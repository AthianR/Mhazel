<?php

namespace App\Http\Livewire;

use App\Models\Produk;
use Livewire\Component;

class SearchBar extends Component
{
    public $search;
    protected $queryString = ['search'];
    public $limitPerPage = 5;

    public function render()
    {
        $posts = Produk::latest()->paginate($this->limitPerPage);
        // dd($posts);

        if ($this->search !== null) {
            $posts = Produk::where('nama_produk', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate($this->limitPerPage);
        }
        $this->emit('searchBar');

        return view('livewire.search-bar', ['posts' => $posts]);
    }
}

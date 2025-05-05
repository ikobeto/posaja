<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Basictable extends Component
{

    use WithPagination;
    
    public $model;
    public $columns = [];
    public $actions = [];
    protected $paginationTheme = 'bootstrap'; // Perbaiki typo
    public $sortField = 'created_at'; // Kolom default untuk sorting
    public $sortDirection = 'ASC'; // 'asc' atau 'desc'
    public $perpage = 5; // Jumlah item per halaman
    public $search = '';
    public $is_search = false;
    public $is_paranoid = false;
    public $records;
    public $paranoid = false;

    public function setSortby($sortfiled)
    {
        // dd($sortfiled);
        if($this->sortField === $sortfiled) 
        {
            $this->sortDirection = ($this->sortDirection === 'ASC') ? 'DESC' : 'ASC';
            return;
        }

        $this->sortField = $sortfiled;
        $this->sortDirection = 'DESC';
    }

    public function trash()
    {
        $this->paranoid = true;
        $this->resetPage();
        $this->sortField = 'created_at';
        $this->sortDirection = 'DESC';
    }

    public function active()
    {
        $this->paranoid = false;
        $this->resetPage();
        $this->sortField = 'created_at';
        $this->sortDirection = 'DESC';

    }

    public function mount($model, $columns = [], $actions = [], $is_search = false, $is_paranoid = false)
    {
        $this->model = $model;
        $this->columns = $columns;
        $this->actions = $actions;
        $this->is_search = $is_search;
        $this->is_paranoid = $is_paranoid;
    }

    
    
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerpage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = app($this->model)->query();
        if($this->search)
        {
            $query->where(function($q) {
                foreach ($this->columns as $column) {
                    if (strpos($column['field'], '.') === false) {
                        $q->orWhere($column['field'], 'like', '%'.$this->search.'%');
                    }
                }
            });
        }
        $items = $query->orderBy($this->sortField, $this->sortDirection)->paginate($this->perpage);
        if($this->paranoid)
        {
            $items = $query->onlyTrashed()->orderBy($this->sortField, $this->sortDirection)->paginate($this->perpage);
        }
        return view('livewire.components.basictable' , compact('items'));
    }
}

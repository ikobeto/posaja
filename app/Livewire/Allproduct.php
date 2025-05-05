<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product; // Perhatikan huruf besar untuk model
use Livewire\WithPagination;

class Allproduct extends Component
{
    use WithPagination; // Tambahkan ini untuk pagination
    
    public $search = '';
    public $perpage = 5;
    public $sortby = 'created_at';
    public $sortdir = 'DESC';
    protected $paginationTheme = 'bootstrap'; // Perbaiki typo
    public $productId;

    public $name;
    public $code_plu;
    public $price;
    public $category_id;

    public $isedit = false;
    public $produkdelete = null;
    public $produkrestore = null;
    public $paranoid = false;
    
    public function create()
    {
        $this->reset(); 
        
        $this->dispatch('exampleModalLabel'); 
    }

    public function trash()
    {
        $this->paranoid = true;
        $this->resetPage();
        $this->sortby = 'created_at';
        $this->sortdir = 'DESC';
    }

    public function active()
    {
        $this->paranoid = false;
        $this->resetPage();
        $this->sortby = 'created_at';
        $this->sortdir = 'DESC';

    }

    public function restore()
    {
        $product = Product::onlyTrashed()->findOrFail($this->produkrestore);
        $product->restore();
        $this->dispatch('refreshFlashMessage', success: 'Produk berhasil diaktifkan!');
        $this->dispatch('close-modal-restore');
    }

    public function confrimrestore($id)
    {
        $this->produkrestore = $id;
        $this->dispatch('modal-restore');
    }

    public function resetForm()
    {
        $this->reset(['name', 'code_plu', 'price', 'category_id', 'isEdit', 'productId']);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->code_plu = $product->code_plu;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->isedit = true;

        $this->dispatch('exampleModalLabel');
    }
    
    public function confrimremove($id)
    {
        $this->produkdelete = $id;
        $this->dispatch('modal-delete');
    }

    public function delete()
    {
        $product = Product::findOrFail($this->produkdelete);
        $product->delete();
        $this->dispatch('refreshFlashMessage', success: 'Produk berhasil dihapus!');
        $this->dispatch('close-modal-delete');
    }

    public function setSortby($sortfiled)
    {
        if($this->sortby === $sortfiled) 
        {
            $this->sortdir = ($this->sortdir === 'ASC') ? 'DESC' : 'ASC';
            return;
        }

        $this->sortby = $sortfiled;
        $this->sortdir = 'DESC';
    }

    public function save()
    {
        // Validation rules
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric|min:1',
            'category_id' => 'required|exists:category_product,id',
        ];
    
        // Hanya validasi unique saat create
        if (!$this->isedit) {
            $rules['code_plu'] = 'required|unique:product,code_plu';
        } else {
            $rules['code_plu'] = 'required'; // tetap required saat edit, tapi tidak perlu unique
        }
        
        $this->validate($rules);

        if($this->isedit && $this->productId) {
            $product = Product::findorFail($this->productId);
            $product->update([
                'name' => $this->name,
                'code_plu' => $this->code_plu,
                'price' => $this->price,
                'category_id' => $this->category_id
            ]);
            $this->dispatch('refreshFlashMessage', success: 'Produk berhasil diedit!');

        }else{
            \App\Models\Product::create([
                'name' => $this->name,
                'code_plu' => $this->code_plu,
                'price' => $this->price,
                'category_id' => $this->category_id
            ]);
            $this->dispatch('refreshFlashMessage', success: 'Produk berhasil ditambahkan!');

        }

    
        $this->reset(['name', 'code_plu', 'price', 'category_id', 'isedit', 'productId']);
        
        // Close modal and refresh
        $this->dispatch('close-modal'); // If using JavaScript to control modal
       
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
        if($this->paranoid){
            $products = Product::onlyTrashed()
            ->with('category')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortby, $this->sortdir)
            ->paginate($this->perpage);

        }else{ $products = Product::with('category')
            ->where('name', 'like', '%'.$this->search.'%')
            ->orderBy($this->sortby, $this->sortdir)
            ->paginate($this->perpage);
        }
       
        
        return view('livewire.allproduct', ['products' => $products]);
    }
}

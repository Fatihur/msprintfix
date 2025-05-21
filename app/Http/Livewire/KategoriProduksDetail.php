<?php

namespace App\Http\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Kategori;
use Illuminate\View\View;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class KategoriProduksDetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    use AuthorizesRequests;

    public Kategori $kategori;
    public Produk $produk;
    public $produkGambar;
    public $uploadIteration = 0;

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Produk';

    protected $rules = [
        'produk.judul' => ['required', 'max:255', 'string'],
        'produkGambar' => ['image', 'max:1024', 'nullable'],
        'produk.deskripsi' => ['nullable', 'max:255', 'string'],
        'produk.harga' => ['required', 'numeric'],
        'produk.stok' => ['required', 'numeric'],
    ];

    public function mount(Kategori $kategori): void
    {
        $this->kategori = $kategori;
        $this->resetProdukData();
    }

    public function resetProdukData(): void
    {
        $this->produk = new Produk();

        $this->produkGambar = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newProduk(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.kategori_produk.new_title');
        $this->resetProdukData();

        $this->showModal();
    }

    public function editProduk(Produk $produk): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.kategori_produk.edit_title');
        $this->produk = $produk;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        if (!$this->produk->kategori_id) {
            $this->authorize('create', Produk::class);

            $this->produk->kategori_id = $this->kategori->id;
        } else {
            $this->authorize('update', $this->produk);
        }

        if ($this->produkGambar) {
            $this->produk->gambar = $this->produkGambar->store('public');
        }

        $this->produk->save();

        $this->uploadIteration++;

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Produk::class);

        collect($this->selected)->each(function (string $id) {
            $produk = Produk::findOrFail($id);

            if ($produk->gambar) {
                Storage::delete($produk->gambar);
            }

            $produk->delete();
        });

        $this->selected = [];
        $this->allSelected = false;

        $this->resetProdukData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->kategori->produks as $produk) {
            array_push($this->selected, $produk->id);
        }
    }

    public function render(): View
    {
        return view('livewire.kategori-produks-detail', [
            'produks' => $this->kategori->produks()->paginate(20),
        ]);
    }
}

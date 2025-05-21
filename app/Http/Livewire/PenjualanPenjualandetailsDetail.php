<?php

namespace App\Http\Livewire;

use App\Models\Produk;
use Livewire\Component;
use Illuminate\View\View;
use App\Models\Penjualan;
use Livewire\WithPagination;
use App\Models\Penjualandetail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PenjualanPenjualandetailsDetail extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public Penjualan $penjualan;
    public Penjualandetail $penjualandetail;
    public $produksForSelect = [];

    public $selected = [];
    public $editing = false;
    public $allSelected = false;
    public $showingModal = false;

    public $modalTitle = 'New Penjualandetail';

    protected $rules = [
        'penjualandetail.produk_id' => ['required', 'exists:produks,id'],
        'penjualandetail.jumlah' => ['required', 'numeric'],
        'penjualandetail.total' => ['required', 'numeric'],
    ];

    public function mount(Penjualan $penjualan): void
    {
        $this->penjualan = $penjualan;
        $this->produksForSelect = Produk::pluck('judul', 'id');
        $this->resetPenjualandetailData();
    }

    public function resetPenjualandetailData(): void
    {
        $this->penjualandetail = new Penjualandetail();

        $this->penjualandetail->produk_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newPenjualandetail(): void
    {
        $this->editing = false;
        $this->modalTitle = trans('crud.penjualan_penjualandetails.new_title');
        $this->resetPenjualandetailData();

        $this->showModal();
    }

    public function editPenjualandetail(Penjualandetail $penjualandetail): void
    {
        $this->editing = true;
        $this->modalTitle = trans('crud.penjualan_penjualandetails.edit_title');
        $this->penjualandetail = $penjualandetail;

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

        if (!$this->penjualandetail->penjualan_id) {
            $this->authorize('create', Penjualandetail::class);

            $this->penjualandetail->penjualan_id = $this->penjualan->id;
        } else {
            $this->authorize('update', $this->penjualandetail);
        }

        $this->penjualandetail->save();

        $this->hideModal();
    }

    public function destroySelected(): void
    {
        $this->authorize('delete-any', Penjualandetail::class);

        Penjualandetail::whereIn('id', $this->selected)->delete();

        $this->selected = [];
        $this->allSelected = false;

        $this->resetPenjualandetailData();
    }

    public function toggleFullSelection(): void
    {
        if (!$this->allSelected) {
            $this->selected = [];
            return;
        }

        foreach ($this->penjualan->penjualandetails as $penjualandetail) {
            array_push($this->selected, $penjualandetail->id);
        }
    }

    public function render(): View
    {
        return view('livewire.penjualan-penjualandetails-detail', [
            'penjualandetails' => $this->penjualan
                ->penjualandetails()
                ->paginate(20),
        ]);
    }
}

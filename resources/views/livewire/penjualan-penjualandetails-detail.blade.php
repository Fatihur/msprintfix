<div>
    <div class="mb-4">
        @can('create', App\Models\Penjualandetail::class)
        <button class="btn btn-primary" wire:click="newPenjualandetail">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Penjualandetail::class)
        <button
            class="btn btn-danger"
             {{ empty($selected) ? 'disabled' : '' }} 
            onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
            wire:click="destroySelected"
        >
            <i class="icon ion-md-trash"></i>
            @lang('crud.common.delete_selected')
        </button>
        @endcan
    </div>

    <x-modal id="penjualan-penjualandetails-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                            name="penjualandetail.produk_id"
                            label="Produk"
                            wire:model="penjualandetail.produk_id"
                        >
                            <option value="null" disabled>Please select the Produk</option>
                            @foreach($produksForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="penjualandetail.jumlah"
                            label="Jumlah"
                            wire:model="penjualandetail.jumlah"
                            max="255"
                            step="0.01"
                            placeholder="Jumlah"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="penjualandetail.total"
                            label="Total"
                            wire:model="penjualandetail.total"
                            max="255"
                            step="0.01"
                            placeholder="Total"
                        ></x-inputs.number>
                    </x-inputs.group>
                </div>
            </div>

            @if($editing) @endif

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th>
                        <input
                            type="checkbox"
                            wire:model="allSelected"
                            wire:click="toggleFullSelection"
                            title="{{ trans('crud.common.select_all') }}"
                        />
                    </th>
                    <th class="text-left">
                        @lang('crud.penjualan_penjualandetails.inputs.produk_id')
                    </th>
                    <th class="text-right">
                        @lang('crud.penjualan_penjualandetails.inputs.jumlah')
                    </th>
                    <th class="text-right">
                        @lang('crud.penjualan_penjualandetails.inputs.total')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($penjualandetails as $penjualandetail)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $penjualandetail->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">
                        {{ optional($penjualandetail->produk)->judul ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $penjualandetail->jumlah ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $penjualandetail->total ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $penjualandetail)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editPenjualandetail({{ $penjualandetail->id }})"
                            >
                                <i class="icon ion-md-create"></i>
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">{{ $penjualandetails->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

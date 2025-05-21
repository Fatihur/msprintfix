<div>
    <div class="mb-4">
        @can('create', App\Models\Produk::class)
        <button class="btn btn-primary" wire:click="newProduk">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.new')
        </button>
        @endcan @can('delete-any', App\Models\Produk::class)
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

    <x-modal id="kategori-produk-modal" wire:model="showingModal">
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
                        <x-inputs.text
                            name="produk.judul"
                            label="Judul"
                            wire:model="produk.judul"
                            maxlength="255"
                            placeholder="Judul"
                        ></x-inputs.text>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <div
                            image-url="{{ $editing && $produk->gambar ? \Storage::url($produk->gambar) : '' }}"
                            x-data="imageViewer()"
                            @refresh.window="refreshUrl()"
                        >
                            <x-inputs.partials.label
                                name="produkGambar"
                                label="Gambar"
                            ></x-inputs.partials.label
                            ><br />

                            <!-- Show the image -->
                            <template x-if="imageUrl">
                                <img
                                    :src="imageUrl"
                                    class="
                                        object-cover
                                        rounded
                                        border border-gray-200
                                    "
                                    style="width: 100px; height: 100px;"
                                />
                            </template>

                            <!-- Show the gray box when image is not available -->
                            <template x-if="!imageUrl">
                                <div
                                    class="
                                        border
                                        rounded
                                        border-gray-200
                                        bg-gray-100
                                    "
                                    style="width: 100px; height: 100px;"
                                ></div>
                            </template>

                            <div class="mt-2">
                                <input
                                    type="file"
                                    name="produkGambar"
                                    id="produkGambar{{ $uploadIteration }}"
                                    wire:model="produkGambar"
                                    @change="fileChosen"
                                />
                            </div>

                            @error('produkGambar')
                            @include('components.inputs.partials.error')
                            @enderror
                        </div>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.textarea
                            name="produk.deskripsi"
                            label="Deskripsi"
                            wire:model="produk.deskripsi"
                        ></x-inputs.textarea>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="produk.harga"
                            label="Harga"
                            wire:model="produk.harga"
                            max="255"
                            placeholder="Harga"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="produk.stok"
                            label="Stok"
                            wire:model="produk.stok"
                            max="255"
                            placeholder="Stok"
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
                        @lang('crud.kategori_produk.inputs.judul')
                    </th>
                    <th class="text-left">
                        @lang('crud.kategori_produk.inputs.gambar')
                    </th>
                    <th class="text-left">
                        @lang('crud.kategori_produk.inputs.deskripsi')
                    </th>
                    <th class="text-right">
                        @lang('crud.kategori_produk.inputs.harga')
                    </th>
                    <th class="text-right">
                        @lang('crud.kategori_produk.inputs.stok')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($produks as $produk)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">
                        <input
                            type="checkbox"
                            value="{{ $produk->id }}"
                            wire:model="selected"
                        />
                    </td>
                    <td class="text-left">{{ $produk->judul ?? '-' }}</td>
                    <td class="text-left">
                        <x-partials.thumbnail
                            src="{{ $produk->gambar ? \Storage::url($produk->gambar) : '' }}"
                        />
                    </td>
                    <td class="text-left">{{ $produk->deskripsi ?? '-' }}</td>
                    <td class="text-right">{{ $produk->harga ?? '-' }}</td>
                    <td class="text-right">{{ $produk->stok ?? '-' }}</td>
                    <td class="text-right" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('update', $produk)
                            <button
                                type="button"
                                class="btn btn-light"
                                wire:click="editProduk({{ $produk->id }})"
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
                    <td colspan="6">{{ $produks->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

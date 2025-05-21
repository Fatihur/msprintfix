<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'kategori' => [
        'name' => 'Kategori',
        'index_title' => 'Kategoris List',
        'new_title' => 'New Kategori',
        'create_title' => 'Create Kategori',
        'edit_title' => 'Edit Kategori',
        'show_title' => 'Show Kategori',
        'inputs' => [
            'kategori' => 'Kategori',
        ],
    ],

    'produk' => [
        'name' => 'Produk',
        'index_title' => 'Produks List',
        'new_title' => 'New Produk',
        'create_title' => 'Create Produk',
        'edit_title' => 'Edit Produk',
        'show_title' => 'Show Produk',
        'inputs' => [
            'judul' => 'Judul',
            'kategori_id' => 'Kategori',
            'gambar' => 'Gambar',
            'deskripsi' => 'Deskripsi',
            'harga' => 'Harga',
            'stok' => 'Stok',
        ],
    ],

    'penjualan' => [
        'name' => 'Penjualan',
        'index_title' => 'Penjualans List',
        'new_title' => 'New Penjualan',
        'create_title' => 'Create Penjualan',
        'edit_title' => 'Edit Penjualan',
        'show_title' => 'Show Penjualan',
        'inputs' => [
            'tanggal' => 'Tanggal',
            'konsumen' => 'Konsumen',
        ],
    ],

    'penjualan_penjualandetails' => [
        'name' => 'Penjualan Penjualandetails',
        'index_title' => 'Penjualandetails List',
        'new_title' => 'New Penjualandetail',
        'create_title' => 'Create Penjualandetail',
        'edit_title' => 'Edit Penjualandetail',
        'show_title' => 'Show Penjualandetail',
        'inputs' => [
            'produk_id' => 'Produk',
            'jumlah' => 'Jumlah',
            'total' => 'Total',
        ],
    ],

    'barang_masuk' => [
        'name' => 'Barang Masuk',
        'index_title' => 'Barangmasuks List',
        'new_title' => 'New Barangmasuk',
        'create_title' => 'Create Barangmasuk',
        'edit_title' => 'Edit Barangmasuk',
        'show_title' => 'Show Barangmasuk',
        'inputs' => [
            'produk_id' => 'Produk',
            'supplier_id' => 'Supplier',
            'jumlah' => 'Jumlah',
            'harga_beli' => 'Harga Beli',
        ],
    ],

    'supplier' => [
        'name' => 'Supplier',
        'index_title' => 'Suppliers List',
        'new_title' => 'New Supplier',
        'create_title' => 'Create Supplier',
        'edit_title' => 'Edit Supplier',
        'show_title' => 'Show Supplier',
        'inputs' => [
            'nama' => 'Nama',
            'no_hp' => 'No Hp',
            'alamat' => 'Alamat',
        ],
    ],

    'wa' => [
        'name' => 'Wa',
        'index_title' => 'Was List',
        'new_title' => 'New Wa',
        'create_title' => 'Create Wa',
        'edit_title' => 'Edit Wa',
        'show_title' => 'Show Wa',
        'inputs' => [
            'wa' => 'Wa',
        ],
    ],

    'user' => [
        'name' => 'User',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ],
    ],

    'kategori_produk' => [
        'name' => 'Kategori Produk',
        'index_title' => 'Produks List',
        'new_title' => 'New Produk',
        'create_title' => 'Create Produk',
        'edit_title' => 'Edit Produk',
        'show_title' => 'Show Produk',
        'inputs' => [
            'judul' => 'Judul',
            'gambar' => 'Gambar',
            'deskripsi' => 'Deskripsi',
            'harga' => 'Harga',
            'stok' => 'Stok',
        ],
    ],

    'detail_penjualan' => [
        'name' => 'Detail Penjualan',
        'index_title' => 'Penjualandetails List',
        'new_title' => 'New Penjualandetail',
        'create_title' => 'Create Penjualandetail',
        'edit_title' => 'Edit Penjualandetail',
        'show_title' => 'Show Penjualandetail',
        'inputs' => [
            'penjualan_id' => 'Penjualan',
            'produk_id' => 'Produk',
            'jumlah' => 'Jumlah',
            'total' => 'Total',
        ],
    ],
];

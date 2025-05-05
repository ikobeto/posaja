<div>
    <livewire:flashmessage />
    <button class="btn btn-icon btn-primary mb-3 ml-3" wire:click="create"><i class="fas fa-plus"></i> Buat</button>
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <input wire:model.live.debounce.300ms="search" type="text" class="form-control w-50 me-2"
                            placeholder="Cari nama product...">
                        <div class="d-flex justify-content-end mb-3">
                            <select wire:model.live="perpage" class="form-control w-auto " style="width: 200px;">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex mb-2">
                        <button wire:click="active"
                            class="btn {{ $paranoid ? 'btn-secondary text-black' : 'btn-primary' }} ml-2 ">active</button>
                        <button wire:click="trash"
                            class="btn {{ $paranoid ? 'btn-danger' : 'btn-secondary text-black' }} ml-3">Trash</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">#</th>
                                    <th class="text-center align-middle" wire:click="setSortby('name')"><button
                                            style="border: none; outline: none; box-shadow: none; background: none;"
                                            class="align-items-center">
                                            Name
                                            @if ($sortby !== 'name')
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 20px; height: 25px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            @elseif ($sortdir === 'ASC')
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 15px; height: 20px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 15px; height: 20px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            @endif
                                        </button>
                                    </th>
                                    <th class="text-center align-middle" wire:click="setSortby('code_plu')"><button
                                            style="border: none; outline: none; box-shadow: none; background: none;"
                                            class="align-items-center">
                                            Code Plu
                                            @if ($sortby !== 'Code PLu')
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 20px; height: 25px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            @elseif ($sortdir === 'ASC')
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 15px; height: 20px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 15px; height: 20px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            @endif
                                        </button></th>
                                    <th class="text-center align-middle" wire:click="setSortby('price')"><button
                                            style="border: none; outline: none; box-shadow: none; background: none;"
                                            class="align-items-center">
                                            Harga
                                            @if ($sortby !== 'Harga')
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 20px; height: 25px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            @elseif ($sortdir === 'ASC')
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 15px; height: 20px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 15px; height: 20px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            @endif
                                        </button></th>
                                    <th class="text-center align-middle" wire:click="setSortby('category.name')">
                                        <button
                                            style="border: none; outline: none; box-shadow: none; background: none;"
                                            class="align-items-center">
                                            Category
                                            @if ($sortby !== 'Category')
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 20px; height: 25px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            @elseif ($sortdir === 'ASC')
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 15px; height: 20px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    style="width: 15px; height: 20px">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            @endif
                                        </button>
                                    </th>
                                    @if ($paranoid === true)

                                        <th class="text-center align-middle" wire:click="setSortby('deleted_at')">
                                            <button
                                                style="border: none; outline: none; box-shadow: none; background: none;"
                                                class="align-items-center">
                                                deleted_at
                                                @if ($sortby !== 'deleted_at')
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        style="width: 20px; height: 25px">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                    </svg>
                                                @elseif ($sortdir === 'ASC')
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        style="width: 15px; height: 20px">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        style="width: 15px; height: 20px">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                    @else
                                        <th class="text-center align-middle" wire:click="setSortby('created_at')">
                                            <button
                                                style="border: none; outline: none; box-shadow: none; background: none;"
                                                class="align-items-center">
                                                Created_at
                                                @if ($sortby !== 'Created_at')
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        style="width: 20px; height: 25px">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                    </svg>
                                                @elseif ($sortdir === 'ASC')
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        style="width: 15px; height: 20px">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        style="width: 15px; height: 20px">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </th>
                                    @endif
                                    <th class="text-center align-middle">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $produk)
                                    <tr>
                                        <td>{{ ($products->currentPage() - 1) * $products->perpage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $produk->name }}</td>
                                        <td>{{ $produk->code_plu }}</td>
                                        <td>Rp.{{ number_format($produk->price, 0, ',', '.') }}</td>
                                        <td>{{ $produk->category->name }}</td>
                                        @if ($paranoid === true)
                                            <td>{{ $produk->deleted_at }}</td>
                                        @else
                                            <td>{{ $produk->created_at }}</td>
                                        @endif
                                        <td>
                                            @if ($paranoid === true)
                                                <button class="btn btn-icon btn-success"
                                                    wire:click="confrimrestore({{ $produk->id }})"><i
                                                        class="fas fa-recycle"></i> </button>
                                            @else
                                                <button class="btn btn-icon btn-primary "
                                                    wire:click="edit({{ $produk->id }})"><i
                                                        class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-danger"
                                                    wire:click="confrimremove({{ $produk->id }})"><i
                                                        class="fas fa-trash"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data not found
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $products->links() }}
                        </div>
                        <!-- Modal Create/Edit Produk -->
                        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-dialog">
                                    <form wire:submit.prevent="save" class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $isedit ? 'edit' : 'buat' }} Produk</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Nama Produk</label>
                                                <input type="text" class="form-control mb-2"
                                                    placeholder="Nama Produk" wire:model.defer="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="kode_plu">Kode PLU</label>
                                                <input type="text" class="form-control mb-2"
                                                    placeholder="Kode PLU" wire:model.defer="code_plu"
                                                    @if ($isedit) readonly @endif>
                                                @error('code_plu')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Harga</label>
                                                <input type="number" class="form-control mb-2" placeholder="Harga"
                                                    wire:model.defer="price">
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Kategori Produk</label>
                                                <select class="form-control mb-2" wire:model.defer="category_id">
                                                    <option value="">-- Pilih Kategori --</option>
                                                    @foreach (\App\Models\category_product::all() as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- modal delete -->
                        <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog"
                            aria-labelledby="modal-delete" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Produk</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus produk ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" wire:click.prevent="delete" class="btn btn-danger"><i
                                                class="fas fa-trash"></i> Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal restore -->
                        <div class="modal fade" id="modal-restore" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Restore Produk</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin Restore produk ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" wire:click.prevent="restore" class="btn btn-danger"><i
                                                class="fas fa-recycle"></i> Restore</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.addEventListener('close-modal', event => {
                $('#exampleModal').modal('hide');
            });
            window.addEventListener('close-modal-delete', event => {
                $('#modal-delete').modal('hide');
            });
            window.addEventListener('close-modal-restore', event => {
                $('#modal-restore').modal('hide');
            });
            window.addEventListener('exampleModalLabel', event => {
                // Buka modal dengan ID atau label tertentu
                $('#exampleModal').modal('show'); // Jika menggunakan Bootstrap
                // atau
            });
            window.addEventListener('modal-delete', event => {
                // Buka modal dengan ID atau label tertentu
                $('#modal-delete').modal('show'); // Jika menggunakan Bootstrap
                // atau
            });
            window.addEventListener('modal-restore', event => {
                // Buka modal dengan ID atau label tertentu
                $('#modal-restore').modal('show'); // Jika menggunakan Bootstrap
                // atau
            });
        </script>
    </div>

<div>

    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        @if ($is_search)
                            <input wire:model.live.debounce.300ms="search" type="text" class="form-control w-50 me-2"
                                placeholder="Cari nama product...">
                        @else
                            <div class="w-50 me-2"></div> <!-- Elemen kosong pengganti input -->
                        @endif
                        <div>
                            <select wire:model.live="perpage" class="form-control w-auto " style="width: 200px;">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    @if ($is_paranoid)
                        <div class="d-flex mb-2">
                            <button wire:click="active"
                                class="btn {{ $paranoid ? 'btn-secondary text-black' : 'btn-primary' }} ml-2 ">active</button>
                            <button wire:click="trash"
                                class="btn {{ $paranoid ? 'btn-danger' : 'btn-secondary text-black' }} ml-3">Trash</button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">#</th>
                                    @foreach ($columns as $col)
                                        <th class="text-center align-middle"
                                            wire:click="setSortby('{{ $col['sortby'] }}')">
                                            <button
                                                style="border: none; outline: none; box-shadow: none; background: none;"
                                                class="align-items-center">
                                                {{ $col['label'] }}
                                                @if ($sortField !== $col['sortby'])
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        style="width: 20px; height: 25px">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                    </svg>
                                                @elseif ($sortDirection === 'ASC')
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
                                    @endforeach

                                    @if (!empty($actions))
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if ($items->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">Data not found</td>
                                    </tr>
                                @else
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ ($items->currentPage() - 1) * $items->perpage() + $loop->iteration }}
                                            </td>
                                            @foreach ($columns as $col)
                                                <td>
                                                    {{ data_get($item, $col['field']) }}
                                                </td>
                                            @endforeach

                                            @if (!empty($actions))
                                                <td>
                                                    @if ($paranoid === true)
                                                        <button class="btn btn-icon btn-success"
                                                            wire:click="confrimrestore({{ $item->id }})"><i
                                                                class="fas fa-recycle"></i> </button>
                                                    @else
                                                        @if (in_array('edit', $actions))
                                                            <button
                                                                wire:click="$emitUp('triggerEdit', {{ $item->id }})"
                                                                class="btn btn-warning btn-sm"><i
                                                                    class="fas fa-edit"></i></button>
                                                        @endif
                                                        @if (in_array('show', $actions))
                                                            <button
                                                                wire:click="$emitUp('triggerShow', {{ $item->id }})"
                                                                class="btn btn-info btn-sm"><i
                                                                    class="fas fa-eye"></i></button>
                                                        @endif
                                                        @if (in_array('delete', $actions))
                                                            <button
                                                                wire:click="$emitUp('triggerDelete', {{ $item->id }})"
                                                                class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-trash"></i></button>
                                                        @endif
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

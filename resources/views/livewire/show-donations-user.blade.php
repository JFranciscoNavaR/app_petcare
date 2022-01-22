<div wire:init="loadDonationsUser">
    @if (count($donations))
        <div class="card">
            <div class="card-header">
                <div class="input-group">
                    <span class="my-auto">Mostrar</span>
                    <select wire:model="cantidad"
                        class="mx-2 btn rounded btn-outline-dark dropdown-toggle dropdown-toggle-split">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="my-auto">donaciones</span>
                    <input class="mx-2 form-control" width="50px" wire:model="search" type="text"
                        placeholder="Ingrese el nombre de la donación">
                </div>
            </div>
            @if (count($donations))
                <div class="card-body">
                    <div class="row justify-content-start px-2 py-2">
                        <div class="row row-cols-1 row-cols-md-5 g-2">
                            @foreach ($donations as $item)
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="" class="card-img-top" alt="{{ $item->nombre }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->nombre }}</h5>
                                            <p class="card-text">{{ Str::limit($item->descripcion, 100) }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row g-4 align-items-center">
                                                <div class="col-auto">
                                                    <label class="col-form-label">${{ $item->monto }} MXN</label>
                                                </div>
                                                <div class="col-auto">
                                                    <a class="font-bold py-2 px-2 text-white rounded btn-primary hover:btn-primary"
                                                    href="{{ route('donation.pay', $item) }}">
                                                        Donar
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if (count($donations))
                    <div class="card-footer">
                        @if ($donations->hasPages())
                            <div class="pagination justify-content-end">
                                {{ $donations->links() }}
                            </div>
                        @endif
                    </div>
                @endif
            @endif
        </div>
    @else
        <div class="px-6 py-4" wire:loading.remove>
            No se ha encontrado ningún registro.
        </div>
    @endif
</div>

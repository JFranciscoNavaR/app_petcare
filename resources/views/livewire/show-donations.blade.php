<div wire:init="loadDonations">
    <div class="card">
        <div class="card-header">
            <div class="input-group">
                <span class="my-auto">Mostrar</span>
                <select wire:model="cantidad" class="mx-2 btn rounded btn-outline-dark dropdown-toggle dropdown-toggle-split">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="my-auto">donaciones</span>
                <input class="mx-2 form-control" width="50px" wire:model="search" type="text"
                    placeholder="Ingrese el nombre de la donación">
                @livewire('create-donation')
            </div>
        </div>
        @if (count($donations))
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="pe-auto" wire:click="order('id')">
                                    Id
                                    @if ($sort == 'id')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th wire:click="order('nombre')">
                                    Nombre
                                    @if ($sort == 'nombre')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th wire:click="order('monto')">
                                    Monto
                                    @if ($sort == 'monto')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                                <th wire:click="order('descripcion')">
                                    Descripción
                                    @if ($sort == 'descripcion')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                        @else
                                            <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                        @endif
                                    @else
                                        <i class="fas fa-sort float-right mt-1"></i>
                                    @endif
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donations as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>${{ $item->monto }} MXN</td>
                                    <td>{{ $item->descripcion }}</td>
                                    <td width="50px">
                                        <a class="btn btn-warning btn-sm" wire:click="edit({{ $item }})">
                                            <i class="fas fa-edit">Editar</i>
                                        </a>
                                    </td>
                                    <td width="50px">
                                        <a class="btn btn-danger btn-sm"
                                            wire:click="$emit('alert_delete_donation', {{ $item->id }})">
                                            <i class="fas fa-trash">Eliminar</i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                @if ($donations->hasPages())
                    <div class="pagination justify-content-end">
                        {{ $donations->links() }}
                    </div>
                @endif
            </div>
        @else
            <div class="px-6 py-4" wire:loading.remove>
                No se ha encontrado ningún registro.
            </div> 
        @endif
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <x-slot name="title">
            <h5 class="modal-title">Editar Donacion</h5>
        </x-slot>
        <x-slot name="content">
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="donation.nombre" required class="form-control" id="floatingInput"
                            placeholder="Nombre de la donación">
                        <label for="floatingInput">Nombre</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" wire:model="donation.monto" required class="form-control" id="floatingInput"
                            placeholder="Monto de la donación">
                        <label for="floatingInput">Monto</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating">
                        <textarea class="form-control" wire:model="donation.descripcion"
                            placeholder="Descripción de la donación" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Descripción</label>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-danger" wire:click="$set('open_edit', false)">Cancelar</button>
            <button type="button" class="btn btn-warning" wire:click="update" wire:loading.attr="disabled"
                wire:target="save">Actualizar</button>
        </x-slot>
    </x-jet-dialog-modal>
    @push('js')
        <script src="sweetalert2.all.min.js"></script>
    @endpush
</div>
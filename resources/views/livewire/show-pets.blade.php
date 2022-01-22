<div wire:init="loadPets">
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
                <span class="my-auto">mascotas</span>
                <input class="mx-2 form-control" width="50px" wire:model="search" type="text"
                    placeholder="Ingrese el nombre de la mascota">
                @livewire('create-pet')
            </div>
        </div>
        @if (count($pets))
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="pe-auto" wire:click="order('id')">
                                    Id
                                    @if ($sort == 'id')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('image')">
                                    Imangen
                                    @if ($sort == 'image')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('nombre')">
                                    Nombre
                                    @if ($sort == 'nombre')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('edad')">
                                    Edad
                                    @if ($sort == 'edad')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('sexo')">
                                    Sexo
                                    @if ($sort == 'sexo')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('peso')">
                                    Peso
                                    @if ($sort == 'peso')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('color')">
                                    Color
                                    @if ($sort == 'color')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('raza')">
                                    Raza
                                    @if ($sort == 'raza')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('especie')">
                                    Especie
                                    @if ($sort == 'especie')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('type_id')">
                                    Tipo
                                    @if ($sort == 'type_id')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('statu_id')">
                                    Estatus
                                    @if ($sort == 'statu_id')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                                <th wire:click="order('descripcion')">
                                    Descripción
                                    @if ($sort == 'descripcion')
                                        @if ($direction == 'asc')
                                            <i class="bi bi-chevron-up"></i>
                                        @else
                                            <i class="bi bi-chevron-down"></i>
                                        @endif
                                    @else
                                        <i class="bi bi-chevron-expand"></i>
                                    @endif
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pets as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td><img src="{{ $item->image }}" class="h-1" width="50px" atl=""></td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->edad }}</td>
                                    <td>{{ $item->sexo }}</td>
                                    <td>{{ $item->peso }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td>{{ $item->raza }}</td>
                                    <td>{{ $item->especie }}</td>
                                    <td>{{ $item->type->nombre }}</td>
                                    <td>{{ $item->statu->nombre }}</td>
                                    <td>{{ $item->descripcion }}</td>
                                    <td width="50px">
                                        <a class="btn btn-warning btn-sm" wire:click="edit({{ $item }})">
                                            <i class="bi bi-pencil-fill">Editar</i>
                                        </a>
                                    </td>
                                    <td width="50px">
                                        <a class="btn btn-danger btn-sm"
                                            wire:click="$emit('alert_delete_pet', {{ $item->id }})">
                                            <i class="bi bi-trash-fill">Eliminar</i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                @if ($pets->hasPages())
                    <div class="pagination justify-content-end">
                        {{ $pets->links() }}
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
            <h5 class="modal-title">Editar Mascota</h5>
        </x-slot>
        <x-slot name="content">
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="pet.nombre" required class="form-control" id="floatingInput"
                            placeholder="Nombre de la mascota">
                        <label for="floatingInput">Nombre</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" wire:model="pet.edad" required class="form-control" id="floatingInput"
                            placeholder="Edad de la mascota">
                        <label for="floatingInput">Edad en Meses</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <select class="form-select" wire:model="pet.sexo" required id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Seleccione un sexo</option>
                            <option value="Hembra">Hembra</option>
                            <option value="Macho">Macho</option>
                        </select>
                        <label for="floatingSelect">Seleccione una Opción</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" wire:model="pet.peso" required class="form-control" id="floatingInput"
                            placeholder="Peso de la mascota">
                        <label for="floatingInput">Peso en Kg</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="pet.color" required class="form-control" id="floatingInput"
                            placeholder="Color de la mascota">
                        <label for="floatingInput">Color</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="pet.raza" required class="form-control" id="floatingInput"
                            placeholder="Raza de la mascota">
                        <label for="floatingInput">Raza</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="pet.especie" required class="form-control" id="floatingInput"
                            placeholder="Especie de la mascota">
                        <label for="floatingInput">Especie</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <select class="form-select" wire:model="pet.type_id" required id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Seleccione un tipo</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->nombre }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Seleccione una Opción</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <select class="form-select" wire:model="pet.statu_id" required id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected>Seleccione un estatu</option>
                            @foreach ($status as $statu)
                                <option value="{{ $statu->id }}">{{ $statu->nombre }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Seleccione una Opción</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <textarea class="form-control" wire:model="pet.descripcion"
                            placeholder="Descripción de la mascota" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Descripción</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Selecciona un archivo</label>
                <input class="form-control" wire:model="image" type="file" id="{{ $identificador }}">
            </div>
            <div wire:loading wire:target="image"
                class="mb-4 alert alert-primary align-items-center px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen Cargando!</strong>
                <span class="block sm:inline">Espere un momento.</span>
            </div>
            @if ($image)
                <div class="container-fluid mb-3">
                    <div class="row justify-content-around" id="">
                        <div class="col text-center">
                            <img src="{{ $image->temporaryUrl() }}">
                        </div>
                    </div>
                </div>
            @else
                <div class="container-fluid mb-3">
                    <div class="row justify-content-around" id="">
                        <div class="col text-center">
                            <img src="{{ $pet->image }}" alt="{{ $pet->nombre }}">
                        </div>
                    </div>
                </div>
            @endif
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-danger" wire:click="$set('open_edit', false)"><i class="bi bi-x-lg">Cancelar</i></button>
            <button type="button" class="btn btn-warning" wire:click="update" wire:loading.attr="disabled"
                wire:target="save, image"><i class="bi bi-pencil-fill">Actualizar</i></button>
        </x-slot>
    </x-jet-dialog-modal>
    @push('js')
        <script src="sweetalert2.all.min.js"></script>
    @endpush
</div>

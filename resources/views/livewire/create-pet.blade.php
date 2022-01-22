<div>
    <a class="btn btn-success btn-sm py-2" wire:click="$set('open', true)">
        <i class="bi bi-plus-square-fill">Agregar</i>
    </a>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h5 class="modal-title">Agregar Mascota</h5>
        </x-slot>
        <x-slot name="content">
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="nombre" required class="form-control" id="floatingInput"
                            placeholder="Nombre de la mascota">
                        <label for="floatingInput">Nombre</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" wire:model="edad" required class="form-control" id="floatingInput"
                            placeholder="Edad de la mascota">
                        <label for="floatingInput">Edad en Meses</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <select class="form-select" wire:model="sexo" required id="floatingSelect"
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
                        <input type="number" wire:model="peso" required class="form-control" id="floatingInput"
                            placeholder="Peso de la mascota">
                        <label for="floatingInput">Peso en Kg</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="color" required class="form-control" id="floatingInput"
                            placeholder="Color de la mascota">
                        <label for="floatingInput">Color</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="raza" required class="form-control" id="floatingInput"
                            placeholder="Raza de la mascota">
                        <label for="floatingInput">Raza</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="especie" required class="form-control" id="floatingInput"
                            placeholder="Especie de la mascota">
                        <label for="floatingInput">Especie</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <select class="form-select" wire:model="type_id" required id="floatingSelect"
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
                        <select class="form-select" wire:model="statu_id" required id="floatingSelect"
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
                        <textarea class="form-control" wire:model="descripcion"
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
            @endif
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-danger" wire:click="$set('open', false)">Cancelar</button>
            <button type="button" class="btn btn-success" wire:click="save" wire:loading.attr="disabled"
                wire:target="save, image">Agregar</button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

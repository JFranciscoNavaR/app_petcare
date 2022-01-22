@section('titulo')
    {{ $titulo }}
@endsection
<div wire:init="loadPets">
    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/b1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/b2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/b3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    @if (count($pets))
    <div class="card">
        <div class="card-header">
            <div class="input-group">
                <span class="my-auto">Mostrar</span>
                <select wire:model="cantidad" class="mx-2 btn btn-outline-dark dropdown-toggle rounded dropdown-toggle-split">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
                <span class="my-auto">mascotas</span>
                <input class="mx-2 form-control" width="50px" wire:model="search" type="text"
                    placeholder="Ingrese el nombre de la mascota">
            </div>
        </div>
        @if (count($pets))
            <div class="card-body">
                <div class="row justify-content-start px-2 py-2">
                    <div class="row row-cols-1 row-cols-md-5 g-2">
                        @foreach ($pets as $item)
                            <div class="col">
                                <div class="card h-100">
                                    <img src="{{ $item->image }}" class="card-img-top" alt="{{ $item->nombre }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->nombre }}</h5>
                                        <p class="card-text">{{ Str::limit($item->descripcion, 100) }}</p>
                                    </div>
                                    <div class="card-footer py-3">
                                        <div class="text-center">
                                            <a class="font-bold text-white py-2 px-4 rounded btn-primary hover:btn-primary"
                                                wire:click="show({{ $item }})">
                                                <i class="bi bi-eye-fill">Ver más</i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @if (count($pets))
                <div class="card-footer">
                    @if ($pets->hasPages())
                        <div class="pagination justify-content-end">
                            {{ $pets->links() }}
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
    <x-jet-dialog-modal wire:model="open_show">
        <x-slot name="title">
            <h5 class="modal-title">Información de la mascota</h5>
        </x-slot>
        <x-slot name="content">
            @if ($image)
                <div class="container-fluid mb-3">
                    <div class="row justify-content-around" id="">
                        <div class="col text-center">
                            <img class="img-fluid" src="{{ $image->temporaryUrl() }}">
                        </div>
                    </div>
                </div>
            @else
                <div class="container-fluid mb-3">
                    <div class="row justify-content-around" id="">
                        <div class="col text-center">
                            <img class="img-fluid" src="{{ $pet->image }}" alt="{{ $pet->nombre }}">
                        </div>
                    </div>
                </div>
            @endif
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="pet.nombre" required class="form-control" id="floatingInput"
                            placeholder="Nombre de la mascota" disabled>
                        <label for="floatingInput">Nombre</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" wire:model="pet.edad" required class="form-control" id="floatingInput"
                            placeholder="Edad de la mascota" disabled>
                        <label for="floatingInput">Edad en Meses</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <select class="form-select" wire:model="pet.sexo" required id="floatingSelect"
                            aria-label="Floating label select example" disabled>
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
                            placeholder="Peso de la mascota" disabled>
                        <label for="floatingInput">Peso en Kg</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="pet.color" required class="form-control" id="floatingInput"
                            placeholder="Color de la mascota" disabled>
                        <label for="floatingInput">Color</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="pet.raza" required class="form-control" id="floatingInput"
                            placeholder="Raza de la mascota" disabled>
                        <label for="floatingInput">Raza</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="pet.especie" required class="form-control" id="floatingInput"
                            placeholder="Especie de la mascota" disabled>
                        <label for="floatingInput">Especie</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <select class="form-select" wire:model="pet.type_id" required id="floatingSelect"
                            aria-label="Floating label select example" disabled>
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
                            aria-label="Floating label select example" disabled>
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
                            placeholder="Descripción de la mascota" id="floatingTextarea" disabled></textarea>
                        <label for="floatingTextarea">Descripción</label>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-danger" wire:click="$set('open_show', false)"><i class="bi bi-x-lg">Cerrar</i></button>
        </x-slot>
    </x-jet-dialog-modal>     
</div>

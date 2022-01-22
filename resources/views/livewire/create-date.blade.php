<div>
    <a class="btn btn-success btn-sm py-2" wire:click="$set('open', true)">
        <i class="fas fa-add">Agregar</i>
    </a>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h5 class="modal-title">Agregar Cita</h5>
        </x-slot>
        <x-slot name="content">
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="date" min="{{ date('Y-m-d', time()) }}" wire:model="fecha" required class="form-control" id="floatingInput"
                            placeholder="Fecha de la cita">
                        <label for="floatingInput">Fecha</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="time" min="{{ date('H:i:s', time()); }}" wire:model="tiempo" required class="form-control" id="floatingInput"
                            placeholder="Hora de la cita">
                        <label for="floatingInput">Hora</label>
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
                            placeholder="Descripción de la cita" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Descripción</label>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-danger" wire:click="$set('open', false)">Cancelar</button>
            <button type="button" class="btn btn-success" wire:click="save" wire:loading.attr="disabled"
                wire:target="save">Agregar</button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

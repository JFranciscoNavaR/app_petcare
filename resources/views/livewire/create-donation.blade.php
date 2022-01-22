<div>
    <a class="btn btn-success btn-sm py-2" wire:click="$set('open', true)">
        <i class="fas fa-add">Agregar</i>
    </a>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h5 class="modal-title">Agregar Donacion</h5>
        </x-slot>
        <x-slot name="content">
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" wire:model="nombre" required class="form-control" id="floatingInput"
                            placeholder="Nombre de la donación">
                        <label for="floatingInput">Nombre</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="number" wire:model="monto" required class="form-control" id="floatingInput"
                            placeholder="Monto de la donación">
                        <label for="floatingInput">Monto</label>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col">
                    <div class="form-floating">
                        <textarea class="form-control" wire:model="descripcion"
                            placeholder="Descripción de la donnación" id="floatingTextarea"></textarea>
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

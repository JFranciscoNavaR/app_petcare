<div class="container">
    <div class="card">       
        <div class="px-2 py-4">
            <div class="d-flex justify-content-between align-items-center mx-2 mb-4">
                <h6 class="text-lg fw-bold text-secundary">Método de pago</h6>
                <img class="img-fluid" width="150px" height="25px" src="https://leadershipmemphis.org/wp-content/uploads/2020/08/780370.png" alt="">
            </div>
            <form action="" id="card-form" class="px-2">
                <div class="mb-6">
                    <label class="d-block text-uppercase tracking-wide text-secondary text-sm-start fw-bold mx-1 mb-2">Nombre de la tarjeta</label>
                    <input required class="form-control" id="card-holder-name" type="text" placeholder="Ingrese el nombre del titular de la tarjeta">
                </div>
                <div class="my-2">
                    <label class="d-block text-uppercase tracking-wide text-secondary text-sm-start fw-bold mx-1 mb-2">Número de tarjeta</label>
                    <div required class="form-control py-2" id="card-element">
                    </div>
                    <span class="text-red-500 text-xs italic" id="card-error"></span>
                </div>
                <button class="fw-bold py-2 px-4 rounded btn btn-primary" wire:loading.attr="disabled" id="card-button">
                    <span class="spinner-border spinner-border-sm" wire:loading role="status" aria-hidden="true"></span>
                    <span class="visually-hidden" wire:loading>Loading...</span>
                    Procesar Pago
                </button>
            </form>
        </div>
    </div>
    @slot('js')
    <script>
        document.addEventListener('livewire:load', function(){
            stripe();
        });
        Livewire.on('resetStripe', function(){
            document.getElementById('card-form').reset();
            stripe();
            alert('La compra se realizo con exito');
        });
        Livewire.on('errorPayment', function(){
            document.getElementById('card-form').reset();
            stripe();
            alert('Hubo un error en la compra intentelo de nuevo');
        })
    </script>
    <script>
        function stripe(){
            const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        
            const elements = stripe.elements();
            const cardElement = elements.create('card');
        
            cardElement.mount('#card-element');
            //token metodo de pago
            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const cardForm = document.getElementById('card-form');
            cardForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const { paymentMethod, error } = await stripe.createPaymentMethod(
                    'card', cardElement, {
                        billing_details: { name: cardHolderName.value }
                    }
                );
                if (error) {
                    document.getElementById('card-error').textContent = error.message;
                } else {
                    Livewire.emit('paymentMethodCreate', paymentMethod.id);
                }
            });
        }
    </script>
    @endslot
</div>
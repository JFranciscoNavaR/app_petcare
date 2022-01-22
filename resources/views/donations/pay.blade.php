<x-app-layout>
    <div class="container py-12 row row-cols-12 row-cols-1 g-6">
        <div class="col col-sm-1 pb-2 col-md-5 col-lg-7">
            <article class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <img src="" width="150px" height="100px" alt="">
                        <div class="ms-4 d-flex justify-content-between flex-grow-1 align-items-center align-self-start">
                            <h4 class="text-secondary fw-bold fs-5 text-uppercase">{{ $donation->nombre }}</h4>
                            <p class="fw-bold text-secondary">${{ $donation->monto }} MXN</p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <p class="text-sm-start text-secondary">{{ Str::limit($donation->descripcion, 100) }}. <a href="" class="text-primary fw-bold text-decoration-none">Terminos y Condiciones</a></p>
                </div>
            </article>
        </div>
        <div class="col col-sm-1 col-md-3 col-lg-5">
            @livewire('donation-pay', ['donation' => $donation])
        </div>
    </div>
</x-app-layout>
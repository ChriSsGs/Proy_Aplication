@include('administrativo.components.header')
@include('administrativo.components.navbar')


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- add categoria -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategoria">
                    Deliverys pendientes
                </button>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">correo</th>
                        <th scope="col">direccion</th>
                        <th scope="col">aprobado?</th>
                        <th scope="col">id de compra</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($delivery as $deli)
                        <tr>
                        <th scope="row">{{ $deli->id }}</th>
                        <td>{{ $deli->direccion }}</td>
                        <td>{{ $deli->collection_status  }}</td>
                        <td>{{ $deli->merchant_order_id   }}</td>
                        <td>{{ $deli->site_id    }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-3">
            </div>
        </div>
    </div>

  @include('administrativo.components.footer')

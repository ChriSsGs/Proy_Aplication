@include('web.header.headerweb');
@include('web.navbar.navbarweb');


@if (!empty(Session::get('carrito')))

    <!-- Carrito -->
    <div class="container">
        <div class="row mt-3 pt-3">
            <div class="col">
                <div class="jumbotron jumbotron-fluid rounded my-5" style="background: #a770ef; background: linear-gradient(to right, #102400, #137909, #00ff5e);">
                    <div class="container">
                        <h1 class="display-4 text-light font-weight-normal">Mi Farmacia</h1>
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <!-- este boton te debe redirigir al Home principal -->
                                <div class="float-right"><a href="{{ route('home')}}" class="btn btn-outline-dark btn-sm"><i class="bi bi-cart-fill"></i> Volver a Home</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12 col-lg-7 col-md-7 col-xl-8">
                <div class="card bg-secondary mb-3">
                    <div class="card-body text-light">
                        <i class="bi bi-cart"></i> Mi Carrito
                    </div>
                </div>
                <form method="POST" action="{{ route('mercadopagox') }}">
                    @csrf
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Correo Electronico</label>
                            <input name='correo' type="email" class="form-control" id="exampleFormControlInput1" placeholder="nombre@dominio.com" required>
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Direccion detallada / referencias</label>
                            <textarea name="direccion" class="form-control" id="exampleFormControlTextarea1" rows="2" required></textarea>
                          </div>
                    </div>
                <!-- listado -->
                <div class="table-responsive text-center">
                     <?php $subtotal = 0; ?>
                     @foreach (Session::get('carrito') as $item)
                     <?php $subtotal = $subtotal + $item->precio ?>
                     @endforeach
                </div>
                <!-- fin listado-->
                <div class="row my-4">
                    <div class="col-6"><a href="{{ route('home') }}" class="btn btn-block btn-light"><i class="bi bi-arrow-left"></i> Regresar al menú</a></div>
                    <!-- este boton debe redirigir a la pagina de Delivery.html -->
                    <div class="col-6"><button class="btn btn-primary" type="submit">ir a comprar</button> </div>
                </div>
                </form>
            </div>
            <div class="col-12 col-lg-5 col-md-5 col-xl-4 mt-2 ">
                <div class="card text-center ">
                    <div class="card-header ">
                        <div class="row ">
                            <div class="col-6 ">Producto</div>
                            <div class="col-6 ">Total</div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item ">
                            @foreach (Session::get('carrito') as $item)
                            <div class="row ">
                                <div class="col-6"><img src="{{ asset($item->imagen) }}" class="img-fluid rounded " width="40">
                                    <p class="mt-3"></p>
                                </div>
                                <div class="col-6 ">{{$item->nombre}}</div>
                            </div>
                            @endforeach
                        </li>
                        <li class="list-group-item ">
                            <div class="row ">
                                <div class="col-6 ">Subtotal</div>
                                <div class="col-6 text-secondary font-weight-light ">S/ {{ round($subtotal/1.18,2) }}</div>
                            </div>
                        </li>
                        <li class="list-group-item ">
                            <div class="row ">
                                <div class="col-6 ">Total</div>
                                <div class="col-6 ">S/ {{number_format($subtotal)}}</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-5 ">
            <div class="col-12 col-lg-4 col-xl-4 ">
                <div class="display-4 ">Recojo de Pedido en <span class="text-success ">Tienda Física</span></div>
                <hr>
                <div class="text-justify ">
                    <p>Recuerda que también puedes acercarte de manera física a recoger tu pedido realizado en nuestra página web.</p>
                    <p class="text-secondary "><i class="bi bi-geo-alt-fill "></i> Ubícanos en:</p>
                    <p>Av. Arequipa 3823, Miraflores 15046</p>
                </div>
            </div>
            <div class="col-12 col-lg-8 col-xl-8 ">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.1245518337796!2d-77.03341361074837!3d-12.103624862282153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c940f6ba28c9%3A0xfaae2988ebcb84c8!2sBOTICA%20PHARMA%20NUTRITION!5e0!3m2!1ses!2spe!4v1658294320536!5m2!1ses!2spe "
                    width="100% " height="400 " style="border:0; " allowfullscreen=" " loading="lazy " referrerpolicy="no-referrer-when-downgrade ">
                </iframe>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade " id="exampleModal " tabindex="-1 " role="dialog " aria-labelledby="exampleModalLabel " aria-hidden="true ">
        <div class="modal-dialog " role="document ">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title " id="exampleModalLabel ">Fin del Proceso</h5>
                    <button type="button " class="close " data-dismiss="modal " aria-label="Close ">
            <span aria-hidden="true ">&times;</span>
          </button>
                </div>
                <div class="modal-body ">¡Su pedido ha sido realizado con éxito!
                    <p class="text-secondary ">Estaremos en contacto con usted pronto <i class="bi bi-emoji-laughing "></i></p>
                </div>
                <div class="modal-footer ">
                    <!-- este boton te debe redirigir al Home principal -->
                    <a href="#" type="button" class="btn btn-success " data-dismiss="modal ">Cerrar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container ">
        <hr>
        <footer>
            <div class="row ">
                <div class="col-12 text-center ">
                    <p>&copy; 2022 Farmacia. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </div>

    <script src="//cdn.jsdelivr.net/bootstrap.filestyle/1.1.0/js/bootstrap-filestyle.min.js "></script>
    <script src="https://assets.jumpseller.com/store/bootstrap/themes/382017/main.js?1619113824 "></script>

    <!-- Evento borrar fila-->
    <script>
        $(document).on('click', '#borrar', function(event) {
            event.preventDefault();
            $(this).closest('tr').remove();
        });
    </script>

@else

<section class=" container shopping-cart dark mt-5 py-5">
    <div class="px-4 py-5 my-5 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#55ff22" class="bi bi-bag-dash-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6 9.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6z"/>
          </svg>
        <h1 class="display-5 fw-bold">No hay productos en el carrito</h1>
      </div>
  </section>
  @endif



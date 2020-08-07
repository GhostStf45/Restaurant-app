@component('mail::message')
# Resumen del pago

Gracias por tu compra. Dentro de 30 a 45 min llegará su pedido.
<p>Aca está tu recibo.</p>
    <p>Datos del repartidor:</p>
    <p>Foto de perfil:</p>
    <img src="https://image.freepik.com/vector-gratis/repartidor-conduciendo-rapido-su-scooter_23-2147671506.jpg" class="d-block rounded-circle" alt="" width="60px" height="60px">
    <p>Nombre: Juan Gonzales Mamani.</p>

<table class="table table-striped table-inverse table-responsive">
    <thead>
        <tr>
            <th>Nombre del producto</th>
            <th>Cantidad</th>
            <th>Precio (S/.)</th>
        </tr>
    </thead>
        <tbody>
            @foreach ($order->items as $item)
            <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->pivot->quantity}}</td>
                    <td>{{$item->pivot->price}}</td>
            </tr>
            @endforeach
        </tbody>
</table>

<p class="font-weight-bold">Total + IGV:S/. {{$order->grand_total*0.18+$order->grand_total}}</p>
<p class="font-weight-bold">Envio:S/. {{$order->grand_total*0.05}}</p>

@component('mail::button', ['url' => ''])
Calificar el servicio
@endcomponent

Thanks, Mikuy<br>
@endcomponent

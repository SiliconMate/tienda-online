<x-mail::message>
# Pedido Enviado

Hola {{ $order->user->firstname }},

¡Tu pedido #{{ $order->id }} ha sido enviado!  

**Mensaje del vendedor:**  
{{ $message }}

Puedes esperar la entrega en la dirección proporcionada:  
{{ $order->address->address_line . " " . $order->address->city . ", " . $order->address->state . " " . $order->address->postal_code }}.

Recuerda que cuando lo recibas debes confirmar la entrega en tu panel de control.

Si necesitas más información, contáctanos.

Gracias por tu compra,  
{{ config('app.name') }}
</x-mail::message>

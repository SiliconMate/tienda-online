<x-mail::message>
# Pedido Cancelado

Hola {{ $order->user->firstname }},

Te informamos que tu pedido #{{ $order->id }} ha sido **cancelado**.  

**Mensaje del vendedor:**  
{{ $message }}

Si tienes alguna pregunta, no dudes en contactarnos.

Gracias por confiar en nosotros,  
{{ config('app.name') }}
</x-mail::message>
<x-app-layout>
    <x-section>
        <x-slot name="title">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ordenes</h2>
            </div>
        </x-slot>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID Orden</th>
                        <th scope="col" class="px-6 py-3">Total</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3">Fecha</th>
                        <th scope="col" class="px-6 py-3">Completado</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->orderDetails as $order)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $order->id }}
                            </th>
                            <td class="px-6 py-4">${{ $order->total_price }}</td>
                            <td class="px-6 py-4">{{ $order->status }}</td>
                            <td class="px-6 py-4">{{ $order->created_at }}</td>
                            <td class="px-6 py-4">{{ $order->completed_at }}</td>
                            <td class="px-6 py-1 flex flex-col">
                                <a href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'show-order-{{ $order->id }}')" class="text-blue-600 hover:underline">
                                    Detallar
                                </a>
                                @include('dashboard.user-buys.partials.show-order-modal', [
                                    'order' => $order->load('orderItems')->load('orderItems.product'),
                                    'paymentDetail' => $order->load('paymentDetail')->paymentDetail
                                ])
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </x-section>
</x-app-layout>
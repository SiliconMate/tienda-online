<x-modal name="reject-order-{{ $order->id }}" :show="$errors->has('rejectOrder')" focusable>
    <form action="{{ route('dashboard.orders.cancel', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-ban text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">¿Estás seguro de que deseas rechazar esta orden?</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 py-0 px-6">
                <textarea name="message" id="message" rows="4" class="form-input rounded-md shadow-sm mt-1 block w-full" placeholder="Escribe un mensaje para el cliente..."></textarea>
            </div>
            <div class="flex items-center justify-end px-6 py-3 bg-gray-400">
                <x-button type="submit" style="danger">
                    Rechazar
                </x-button>
            </div>
        </div>
    </form>
</x-modal>

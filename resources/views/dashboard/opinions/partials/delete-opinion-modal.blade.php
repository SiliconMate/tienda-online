<x-modal name="delete-opinion-{{$opinion->id}}" :show="$errors->any()" focusable>
    <form action="{{ route('dashboard.opinions.destroy', $opinion->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-1 p-6 pb-0">
                <div class="flex items-center">
                    <i class="ti ti-trash text-3xl text-gray-800 pr-2"></i>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">¿Estás seguro de que deseas eliminar esta opinión?</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 py-0 px-6">
                <div class="mb-4">
                    <p class="text-gray-700 text-sm font-bold mb-2">Contenido:</p>
                    <p class="">{{ $opinion->content }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-gray-700 text-sm font-bold mb-2">Estrellas:</p>
                    <div class="mb-4">
                        <div class="flex">
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $opinion->rating)
                                    <i class="ti ti-star-filled text-yellow-500"></i>
                                @else
                                    <i class="ti ti-star text-gray-300"></i>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end px-6 py-3 bg-gray-400">
                <x-button type="submit" style="danger">
                    Eliminar
                </x-button>
            </div>
        </div>
    </form>
</x-modal>
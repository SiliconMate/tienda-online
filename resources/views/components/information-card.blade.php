<div class="card">
    @empty(!$header)
    <div class="px-6 pt-3">
        {{ $header }}
    </div>
    @endempty
    <div class="card-body">
        <h3 class="text-lg font-medium text-gray-600">
            {{ $title }}
        </h3>
        @empty(!$subtitle)
        <p class="text-sm font-medium text-gray-500 dark:text-gray-500 mb-4">
            {{ $subtitle }}
        </p>
        @endempty
        {{ $slot }}
    </div>
    @empty(!$footer)
    <div class="px-6 pb-3">
        {{ $footer }}
    </div>
    @endempty
</div>

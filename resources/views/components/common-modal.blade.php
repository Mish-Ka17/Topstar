@props([
    'id',
    'maxWidth' => 'max-w-lg',
])

<div
    id="modal-{{ $id }}"
    class="flex fixed inset-0 z-50 hidden items-center justify-center"
>
    {{-- overlay --}}
  <div
        class="absolute inset-0 bg-black/50"
        data-modal-close="{{ $id }}"
    ></div>

    {{-- modal --}}
    <div class="relative w-full {{ $maxWidth }} bg-white rounded-lg shadow-xl p-6">
        {{-- header --}}
        @isset($title)
          <div class="mb-4 text-lg font-semibold">
            {{ $title }}
          </div>
        @endisset

        {{-- body --}}
        @isset($content)
          <div class="min-h-[233px]">
            {{ $content }}
          </div>
        @endisset
    </div>
</div>

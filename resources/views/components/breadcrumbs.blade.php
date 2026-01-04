<div class="text-sm text-gray-600 mb-4">
    <div class="flex items-center space-x-2">
        <a href="{{route('home')}}" class="hover:text-blue-600">Главная</a>
        @foreach($breadcrumbs as $crumb)
            <span>/</span>
            <a href="{{$crumb['url']}}" class="hover:text-blue-600">
                {{ $crumb['label'] }}
            </a>
        @endforeach
    </div>
</div>

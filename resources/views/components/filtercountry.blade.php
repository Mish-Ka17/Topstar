 <!--Фильтр по стране -->
        <div class="p-4 bg-gray-100 rounded-lg shadow mb-4">
            <form method="POST" action="{{route('articles.index',[$chapter,$category])}}" class="flex items-center gap-4">
            @csrf
            <div>
            <label class="block text-sm font-medium mb-1">Страна</label>
            <select name="country" class="p-2 border rounded">
                <option value="">Все</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}"
                        {{ $countryselected == $country->id ? 'selected' : '' }}>
                        {{ $country->title }}
                    </option>

                @endforeach
            </select>
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Применить
            </button>
            </form>
        </div>
<!--  -->

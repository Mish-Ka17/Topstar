<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Адаптивность Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen flex flex-col items-center justify-center">

    <h1 class="text-2xl sm:text-3xl lg:text-5xl font-bold mb-10 text-gray-800 text-center">
        🐾 Пример адаптивности Tailwind
    </h1>

    <div class="flex flex-wrap justify-center gap-4 sm:gap-6 md:gap-8 lg:gap-10 px-4">
        @foreach ([
            ['title' => 'Тёплая прогулка', 'img' => 'https://picsum.photos/400?1'],
            ['title' => 'Вечер у костра', 'img' => 'https://picsum.photos/400?2'],
            ['title' => 'Сонное утро', 'img' => 'https://picsum.photos/400?3'],
            ['title' => 'Город и дождь', 'img' => 'https://picsum.photos/400?4'],
        ] as $card)
        <div class="
            bg-white rounded-2xl shadow-lg overflow-hidden transform transition
            hover:-translate-y-2 hover:shadow-2xl hover:rotate-0
            rotate-[-3deg] sm:rotate-[-5deg] md:rotate-[-7deg] lg:rotate-[-10deg]
            w-[150px] sm:w-[200px] md:w-[250px] lg:w-[300px]
            ">
            <img src="{{ $card['img'] }}" alt="{{ $card['title'] }}" class="w-full h-auto">
            <p class="p-3 text-sm sm:text-base md:text-lg text-gray-700 text-center">{{ $card['title'] }}</p>
        </div>
        @endforeach
    </div>

    <footer class="mt-10 text-gray-500 text-sm">
        Сожми окно браузера — увидишь, как карточки “двигаются” и подстраиваются 💫
    </footer>

</body>
</html>

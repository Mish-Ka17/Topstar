<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Chapter → Category → Article</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<!-- Header: Chapters -->
<header class="bg-white shadow">
  <div class="max-w-7xl mx-auto px-4 py-3">
    <nav class="flex flex-wrap gap-2 justify-center md:justify-start">
      <a href="#" class="text-sm md:text-base font-medium text-blue-600">Chapter 1</a>
      <a href="#" class="text-sm md:text-base text-gray-600 hover:text-blue-600">Chapter 2</a>
      <a href="#" class="text-sm md:text-base text-gray-600 hover:text-blue-600">Chapter 3</a>
    </nav>
  </div>
</header>

<!-- Main layout -->
<div class="max-w-7xl mx-auto px-4 py-4">
  <div class="flex flex-col md:flex-row gap-4">

    <!-- Sidebar: Categories -->
    <aside class="w-full md:w-1/4 bg-white rounded shadow p-4">
      <h2 class="font-semibold mb-3 text-gray-700">Categories</h2>
      <ul class="space-y-2">
        <li><a href="#" class="block text-sm text-blue-600 font-medium">Category A</a></li>
        <li><a href="#" class="block text-sm text-gray-600 hover:text-blue-600">Category B</a></li>
        <li><a href="#" class="block text-sm text-gray-600 hover:text-blue-600">Category C</a></li>
      </ul>
    </aside>

    <!-- Content: Article -->
    <main class="w-full md:w-3/4 bg-white rounded shadow p-4 md:p-6">
      <h1 class="text-xl md:text-2xl font-bold mb-4">
        Заголовок статьи
      </h1>

      <article class="prose max-w-none text-sm md:text-base">
        <p>
          Это пример текста статьи. На мобильных устройствах текст меньше,
          а отступы компактнее. На больших экранах — просторнее и удобнее для чтения.
        </p>
        <p>
          Здесь может быть любой контент: изображения, код, списки и т.д.
        </p>
      </article>
    </main>

  </div>
</div>

<!-- Footer -->
<footer class="text-center text-xs text-gray-500 py-4">
  © {{ date('Y') }} Мой сайт
</footer>

</body>
</html>

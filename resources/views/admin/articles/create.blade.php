<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>Document</title>
</head>
<body>

    <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data" id="articleForm">
    @csrf

    <h2 class="text-2xl font-bold mb-4">Создание статьи</h2>

    <select name="country" class="border p-1 mb-2">
        @foreach ($countries as $country)
            <option value="{{$country->id}}">{{$country->title}}</option>
        @endforeach
    </select>

    <input type="text" name="title" class="border w-full p-2 mb-4" placeholder="Заголовок">
    <input type="text" name="slug" class="border w-full p-2 mb-4" placeholder="slug">

    <select name="category" class="border p-1 mb-2">
        @foreach ($menu as $chapter)
            @foreach ($chapter->category as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        @endforeach
    </select>

    <div id="blocks"></div>

    <div class="flex gap-2 mt-4">
        <button type="button" onclick="addParagraph()" class="px-3 py-2 bg-blue-500 text-white rounded">Абзац</button>
        <button type="button" onclick="addHeading()" class="px-3 py-2 bg-green-500 text-white rounded">Заголовок</button>
        <button type="button" onclick="addImage()" class="px-3 py-2 bg-purple-500 text-white rounded">Картинка</button>
        <button type="button" onclick="addVideo()" class="px-3 py-2 bg-red-500 text-white rounded">Видео</button>
    </div>

    <button type="submit" class="mt-6 px-5 py-2 bg-black text-white rounded">Сохранить</button>
    </form>

    <script>
        let blockIndex = 0;

        function addParagraph() {
            document.getElementById('blocks').insertAdjacentHTML('beforeend', `
                <div class="border p-3 mb-3">
                    <input type="hidden" name="content[${blockIndex}][type]" value="paragraph">
                    <textarea name="content[${blockIndex}][text]" class="w-full p-2 border"
                    placeholder="Текст абзаца"></textarea>
                </div>
            `);
            blockIndex++;
        }

        function addHeading() {
            document.getElementById('blocks').insertAdjacentHTML('beforeend', `
                <div class="border p-3 mb-3">
                    <input type="hidden" name="content[${blockIndex}][type]" value="heading">
                    <select name="content[${blockIndex}][level]" class="border p-1 mb-2">
                        <option value="2">H2</option>
                        <option value="3">H3</option>
                        <option value="4">H4</option>
                    </select>
                    <input type="text" name="content[${blockIndex}][text]" class="border p-2 w-full" placeholder="Текст заголовка">
                </div>
            `);
            blockIndex++;
        }

        function addImage() {
            document.getElementById('blocks').insertAdjacentHTML('beforeend', `
                <div class="border p-3 mb-3">
                    <input type="hidden" name="content[${blockIndex}][type]" value="image">
                    <input type="file" name="content[${blockIndex}][file]" class="mb-2">
                    <select name="content[${blockIndex}][position]" class="border p-1">
                        <option value="left">Слева</option>
                        <option value="right">Справа</option>
                        <option value="center">По центру</option>
                    </select>
                    <input type="text" name="content[${blockIndex}][caption]" class="border p-2 w-full" placeholder="Текст подписи">
                </div>
            `);
            blockIndex++;
        }

        function addVideo() {
            document.getElementById('blocks').insertAdjacentHTML('beforeend', `
                <div class="border p-3 mb-3">
                    <input type="hidden" name="content[${blockIndex}][type]" value="video">
                    <input type="file" name="content[${blockIndex}][file]" class="mb-2">
                </div>
            `);
            blockIndex++;
        }
        </script>

</body>
</html>

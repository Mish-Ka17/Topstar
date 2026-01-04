<!-- <div class="bg-indigo-300">
<form action="{{route('register')}}" method="POST" >
    @csrf
    <input type="text" name="name" class="p-2 border rounded">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="password" name="confirm_password">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Регистрирация</button>
</form>
</div> -->

<!-- Подключи Tailwind -->
<!-- <script src="https://cdn.tailwindcss.com"></script> -->

<!-- <div class="min-h-screen flex items-center justify-center bg-gray-100"> -->
<!-- <div id="block"></div> -->

@isset($user)
    <div class="flex flex-row w-50 h-10 justify-center gap-1 p-2 bg-white border rounded shadow">
        <div class="border rounded px-1 py-0.5 text-[10px]">
            {{$user->name}}
        </div>
        <div class="border rounded px-1 py-0.5 text-[10px]">
            {{$user->email}}
        </div>
        <div class="border rounded px-1 py-0.5 text-[10px] cursor-pointer hover:bg-indigo-200">
            <a href="{{route('logout')}}">Выйти</a>
        </div>
    </div>
@endisset

@unless(isset($user))

<div class="flex flex-row">
    <div id="buttons" class="flex flex-row w-30 h-10 justify-center gap-1 p-2  bg-indigo-100">
            <button type="button" onclick="Login()" class="border rounded px-1 py-0.5 text-[10px] hover:bg-indigo-200 cursor-pointer">Войти</button>
            <button type="button" onclick="Register()" class="border rounded px-1 py-0.5 text-[10px] hover:bg-indigo-200 cursor-pointer">Регистрация</button>
    </div>
</div>

<div id="form">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<script>
    function Register() {
        document.getElementById('buttons').style.display="none";
        document.getElementById('form').insertAdjacentHTML('beforeend', `
                <form action="{{route('register')}}" method="POST" class="w-40 h-40 flex flex-col gap-1 p-2 float-right bg-white border rounded shadow">
                @csrf
                <input
                type="text"
                name="name"
                placeholder="Введите имя"
                class="border rounded px-1 py-0.5 text-[10px] focus:outline-none focus:ring-1 focus:ring-blue-400"
                />
                <input
                type="email"
                name="email"
                placeholder="Введите Email"
                class="border rounded px-1 py-0.5 text-[10px] focus:outline-none focus:ring-1 focus:ring-blue-400"
                />
                <input
                type="password"
                name="password"
                placeholder="Введите пароль"
                class="border rounded px-1 py-0.5 text-[10px] focus:outline-none focus:ring-1 focus:ring-blue-400"
                />
                <input
                type="password"
                name="password_confirmation"
                placeholder="Подтвердите пароль"
                class="border rounded px-1 py-0.5 text-[10px] focus:outline-none focus:ring-1 focus:ring-blue-400"
                />
                <button
                type="submit"
                class="mt-1 bg-blue-500 text-white text-[10px] py-1 rounded hover:bg-blue-600"
                >
                Регистрация
                </button>
            </form>
        `);
    }

    function Login() {
        document.getElementById('buttons').style.display="none";
        document.getElementById('form').insertAdjacentHTML('beforeend', `
                <form action="{{route('login')}}" method="POST" class="w-40 h-40 flex flex-col gap-1 p-2 float-right bg-white border rounded shadow">
                @csrf
                <input
                type="email"
                name="email"
                placeholder="Введите Email"
                class="border rounded px-1 py-0.5 text-[10px] focus:outline-none focus:ring-1 focus:ring-blue-400"
                />
                <input
                type="password"
                name="password"
                placeholder="Введите пароль"
                class="border rounded px-1 py-0.5 text-[10px] focus:outline-none focus:ring-1 focus:ring-blue-400"
                />
                <button
                type="submit"
                class="mt-1 bg-blue-500 text-white text-[10px] py-1 rounded hover:bg-blue-600"
                >
                Войти
                </button>
            </form>
        `);
    }

</script>

@endunless

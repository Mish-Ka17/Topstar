<div class="flex">
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
    <div class="flex flex-row" id="auth-manager-status-actions-block-id">
        <div id="buttons" class="flex flex-row w-30 h-10 justify-center gap-1 p-2  bg-indigo-100">
            <button type="button" data-context="login" data-modal-open="auth" class="border rounded px-1 py-0.5 text-[10px] hover:bg-indigo-200 cursor-pointer">Войти</button>
            <button type="button" data-context="register" data-modal-open="auth" class="border rounded px-1 py-0.5 text-[10px] hover:bg-indigo-200 cursor-pointer">Регистрация</button>
        </div>
    </div>
    @endunless

    @push('modals')
    <x-CommonModal id="auth">
        <x-slot name="content">
            <div id="auth-login-content"></div>
        </x-slot>
    </x-CommonModal>
    @endpush
</div>

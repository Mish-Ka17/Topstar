<div class="w-full">
    @isset($user)
      <el-dropdown class="inline-block">
        <button class="inline-flex w-full justify-center gap-x-1.5 px-2 py-1 bg-gray-300 text-sm font-semibold text-gray-600 hover:bg-white/20 cursor-pointer"
        title="{{$user->name}}">
        {{$user->name}}
          <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="-mr-1 size-5 text-gray-600">
            <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
          </svg>
        </button>

        <el-menu anchor="bottom end" popover class="origin-top-right text-gray-600 bg-gray-200 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
          <div class="py-1 flex flex-col">
            <span class="px-2 py-0.5">{{$user->email}}</span>
            <a href="{{route('logout')}}" class="mx-1 px-1 py-0.5 hover:bg-indigo-200 cursor-pointer">Выйти</a>
          </div>
        </el-menu>
      </el-dropdown>
    @endisset

    @unless(isset($user))
    <div class="flex flex-row" id="auth-manager-status-actions-block-id">
      <el-dropdown class="flex flex-row">
        <button type="button" data-context="login" data-modal-open="auth" class="w-full justify-center rounded-md mr-1 px-2 py-1 text-sm font-semibold text-gray-500 bg-indigo-100 hover:bg-indigo-300 hover:text-white cursor-pointer">
          Войти</button>
        <button type="button" data-context="registration" data-modal-open="auth" class="w-full justify-center rounded-md px-2 py-1 text-sm font-semibold text-gray-500 bg-indigo-100 hover:bg-indigo-300 hover:text-white cursor-pointer">
          Регистрация</button>
      </el-dropdown>
     </div>
    @endunless

    @push('modals')
    <x-CommonModal id="auth">
        <x-slot name="content">
            <div id="auth-modal-content"></div>
        </x-slot>
    </x-CommonModal>
    @endpush
 </div>

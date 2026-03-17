<header class="sticky h-[120px] border-b border-gray-400 top-0 z-50 bg-gray-200 text-gray-700">

  <x-alphabet/>

  <div class="flex h-[100px] sm:h-[110px] items-center justify-between">

    <x-logo/>

    <div class="absolute left-25 lg:left-30 xl:left-45 top-12">
      @if(isset($user))
        <x-user :$user/>
      @else
        <x-user/>
      @endif
    </div>

    <x-navigation/>

    <div class="flex w-46">
      <x-search/>
    </div>

  </div>
</header>

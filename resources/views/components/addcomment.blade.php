<div class="p-4 bg-gray-100 rounded-lg shadow mb-4 text-left">
    <form action="{{route('addcomment',[$user,$articleid])}}" method="POST">
    @csrf
      <div>
        <label class="block text-sm font-medium mb-1">Поделитесь Вашим комментарием</label>
        <!-- <p class="italic text-xs">(для зарегистрированых пользователей)</p> -->
        @if(!isset($user))
          <div class="bg-gray-50 border rounded-lg p-4 text-sm text-gray-600">
              <div class="flex-col sm:flex sm:flex-row p-2">
                  <div class="p-2">Чтобы оставить комментарий, пожалуйста, войдите или зарегистрируйтесь:</div>
                  <div class="mt-1"><x-AuthManager.status/></div>
              </div>
          </div>
          <br/>
        @else                     {{--проверка частоты добавления комментов (middleware('throttle:2,1')) --}}
          @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-2 rounded mb-4">
              {{ session('error') }}
            </div>
          @endif                   {{--end --}}
          <div>
            <input type="hidden" name="article_id" value="{{$articleid}}">
            <textarea name="content" placeholder="Текст комментария" maxlength="50" class="w-full p-2 border">

            </textarea>
          </div>
          <button type="submit" class="bg-indigo-200 text-gray-800 px-4 py-2 rounded hover:bg-indigo-300 hover:text-white cursor-pointer">
            Добавить
          </button>
        @endif
      </div>
    </form>
</div>

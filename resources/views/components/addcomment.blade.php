<div class="p-4 bg-gray-100 rounded-lg shadow mb-4">
    <form action="{{route('addcomment',[$user,$articleid])}}" method="POST">
    @csrf
        <div>
            <label class="block text-sm font-medium mb-1">Поделитесь Вашим комментарием</label>
            <!-- <p class="italic text-xs">(для зарегистрированых пользователей)</p> -->
            @if(!isset($user))
              <div class="bg-gray-50 border rounded-lg p-4 text-sm text-gray-600">
                  <div class="flex p-2">
                      <div class="p-2">Чтобы оставить комментарий, пожалуйста, войдите или зарегистрируйтесь:</div>
                      <div><x-AuthManager.status/></div>
                  </div>
              </div>
              <br/>
            @else
              <input type="hidden" name="article_id" value="{{$articleid}}">
              <textarea name="content" placeholder="Текст комментария" maxlength="50" class="w-full p-2 border">

              </textarea>
              </div>
              <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                  Добавить
              </button>
            @endif
    </form>
</div>

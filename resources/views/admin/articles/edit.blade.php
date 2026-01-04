@extends ('layouts.app')
@section ('content')

<form action = "{{route('admin.article.edit', $article)}}" method = "POST" enctype="multipart/form-data" id="articleForm">
     @csrf
    <input type="text" name = "title" value = "{{$article->title}}">

    @foreach ($article->content as $index=>$block)
    <input type = "text" name = "content" value = "{{$block['type']}}">

    @if ($block['type'] === 'heading')
        <input type = "text" name = "content_heading" value = "{{$block['text']}}">
    @endif

    @if ($block['type'] === 'paragraph')
        <textarea name = "content_paragraph" value = "{{$block['text']}}"></teaxtarea>
    @endif

    @endforeach

    <button type="submit">SAVE</button>
</form>

@endsection

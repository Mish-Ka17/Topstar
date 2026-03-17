<h2>Предложение новой персоны</h2>

<p><b>Персона:</b> {{ $suggestion->name }}</p>
<p><b>Область:</b> {{ $suggestion->field ?? 'не указано' }}</p>
<p><b>Email пользователя:</b> {{ $suggestion->user_email ?? 'не указан' }}</p>

<hr>

<p><b>Сообщение:</b></p>
<p>{{ $suggestion->message ?? 'нет сообщения' }}</p>

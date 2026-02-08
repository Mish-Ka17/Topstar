{{-- Точка монтирования Vue-компонента MobileMenu с данными меню (аналогично Auth: target-for-vue-auth-component + data-context) --}}
{{-- Используем одинарные кавычки для атрибута и {!! !!} для вывода JSON без экранирования (данные из контроллера безопасны) --}}
<div id="mobile-menu-mount-point" data-menu='{!! $menuJson !!}'></div>

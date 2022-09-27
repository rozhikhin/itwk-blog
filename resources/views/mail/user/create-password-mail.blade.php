@component('mail::message')
# {{ config('app.name') }}

Ваш пароль: {{ $password }}

@component('mail::button', ['url' => "http://blog.itwk.ru/login" ])
Перейти
@endcomponent

Спасибо за регистрацию на сайте <a href="{{ config('app.url') }}" >{{ config('app.name') }} </a>.
@endcomponent

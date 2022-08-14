@component('mail::message')
# Introduction

Corpo da menssagem.

@component('mail::button', ['url' => ''])
Corpo do botao
@endcomponent


Obrigado,<br>
{{ config('app.name') }}
@endcomponent

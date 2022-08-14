@component('mail::message')
# {{$tarefa->tarefa}}

Data de limite de conclusao:
{{date('d/m/Y',strtotime($tarefa->data_limite_conclusao))}}

@component('mail::button', ['url' => $url])
Ver a tarefa
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent

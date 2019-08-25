@component('mail::message')
# Recuperação de senha

Clique no botão abaixo para renovar a sua senha


@component('mail::button', ['url' => $origin.'/recuperar-senha?token='.$token])
Renovar Senha
@endcomponent

Obrigado,<br>
    Chronos
@endcomponent

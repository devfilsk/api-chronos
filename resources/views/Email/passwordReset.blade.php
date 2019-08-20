@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'http://admin.vizzarconsultoria.com?token='.$token])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

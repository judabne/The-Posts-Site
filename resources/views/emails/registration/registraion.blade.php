@component('mail::message')
Hello {{ $data['name'] }}

We hope you enjoy your experience.


{{ config('app.name') }}
@endcomponent

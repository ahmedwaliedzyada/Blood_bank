@component('mail::message')
# Introduction

Blood Bank Reset Password.

@component('mail::button', ['url' => 'Http://www.google.com'])
Reset
@endcomponent



<p>Your Reset Code Is : {{$code}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

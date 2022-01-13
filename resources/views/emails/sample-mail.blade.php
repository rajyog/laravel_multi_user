@component('mail::message')
# Introduction

The body of your message.
<h1>{{ $details['title'] }}</h1>
<p>{{ $details['body'] }}</p>

<p>Email :  @isset($details['data']['email']) $details['data']['email'] @endisset </p>
<p>Password :   @isset($details['data']['password']) $details['data']['password'] @endisset </p>

<p>otp :   @isset($details['otp']) {{ $details['otp'] }} @endisset </p>


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

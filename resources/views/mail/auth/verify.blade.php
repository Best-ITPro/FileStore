@component('mail::message')
    # Подтверждение электронной почты

    Для подверждения e-mail пройдите по данной ссылке:

    @component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
       Подтвердите свой E-mail
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

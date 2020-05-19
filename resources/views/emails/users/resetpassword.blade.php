@component('mail::message')
#Tere

olete taastamas oma konto parooli Remondiradar.ee keskkonnas.

Parooli taastamiseks klikkige siia
@component('mail::button', ['url' => route('password.reset', ['token' => $token])])
Vajuta siia
@endcomponent

<br>
Sinu Remondiradar.ee
@endcomponent

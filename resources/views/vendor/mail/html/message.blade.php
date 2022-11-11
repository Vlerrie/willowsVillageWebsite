@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => env('APP_URL')])
<img src="{{env('APP_URL')}}/img/logos/wsv_transparent.png" width="300px">

@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
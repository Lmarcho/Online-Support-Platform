@component('mail::message')
# Hello From Lmarcho Shoping Store

 This is test
 {{-- <div>
    Name: {{ $item ?? ''->name }}
    Ref No: {{ $item ?? ''->ref }}
</div> --}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent

@component('mail::message')
<p>
@if(isset( $data['message']))   {{ $data['message']  }}  @endif
</p>

@endcomponent

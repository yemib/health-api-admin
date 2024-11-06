@component('mail::message')
<p>
 <strong> Name  :    </strong><br/>
 @if(isset( $data['name']))  {{  $data['name'] }}  @endif<br/>
 <strong>Phone Number  : </strong><br/>
 @if(isset( $data['phone']))  {{  $data['phone'] }}  @endif
 <br/>
 <strong>Email  : </strong><br/>
 @if(isset( $data['email']))  {{  $data['email'] }}  @endif
 <br/>
<strong>What brings you to seek therapy at this time?</strong><br/>
@if(isset( $data['therapy']))  {{  $data['therapy'] }}  @endif<br/>
<strong>How long have you been experiencing these challenges?</strong><br/>
@if(isset( $data['challenges']))  {{  $data['challenges'] }}  @endif<br/>
<strong>Have you had any prior experience with therapy?</strong><br/>
@if(isset( $data['experience']))  {{  $data['experience'] }}  @endif

<hr/>

@if(isset( $data['message']))   {{ $data['message']  }}  @endif
</p>

@endcomponent

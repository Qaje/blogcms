Click here to reset your password:  <br>
<a href="{{ $link = url('password/reset',$tojen).'?email='.urlencode($user->getEmailForPasswordReset()}}">
{{$link}}</a> 
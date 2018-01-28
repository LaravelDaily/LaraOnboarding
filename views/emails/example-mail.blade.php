<h1> This is LaraOnboarding example email </h1>
<p>Your are registered at {{ $user->created_at }} with email {{ $user->email }}.</p>
<p>Thank you for using our product, awesome!</p>
<br>
<a href="{{ url('laraveldaily-onboarding-unsubscribe', $user->email) }}">Unsubscribe</a>
<!-- reset password form -->
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $request->route('token') }}" />
    <input type="email" name="email" required autofocus />
    <input type="password" name="password" required />
    <input type="password" name="password_confirmation" required />
    <button type="submit">Reset Password</button>
</form>


<h3>Witaj {{$user->name}}</h3>

<p>Aby aktywować konto kliknij w poniższy link</p>

<a href="{{ url('activate/' . $user->activation_code) }}" >Aktywuj konto</a>
    

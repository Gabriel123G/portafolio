<p>Se ha registrado un nuevo usuario:</p>
<ul>
    <li>Nombre: {{ $user->name }}</li>
    <li>Email: {{ $user->email }}</li>
</ul>

<p>Haz clic en el botón para verificar y activar su cuenta:</p>
<a href="{{ url('/verify-user/'.$token) }}" style="background:#4CAF50;color:white;padding:10px 20px;text-decoration:none;">
    Verificar Usuario
</a>

<x-layout page="Login">
    <x-slot:btn>
        <a href="{{ route('register') }}" class="btn btn-secondary">Registrar</a>
    </x-slot:btn>
    <section id='create_task_section'>
        <h1>Login</h1>
        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('login_action') }}">
            @csrf
            <x-form.text-input type="email" name="email" label="E-mail" placeholder="E-mail" required />
            <x-form.text-input type="password" name="password" label="Senha" placeholder="Senha" required />
            <div class="inputArea">
                <x-form.botao name="Entrar" type="submit" />
            </div>
        </form>
    </section>

</x-layout>

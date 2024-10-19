<x-layout page="Register">
    <x-slot:btn>
        <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
    </x-slot:btn>
    <section id='create_task_section'>
        <h1>Registrar</h1>
        <form method="POST" action="{{ route('register_action') }}">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            @csrf
            <x-form.text-input name="name" label="Nome Completo" placeholder="Nome Completo" required />
            <x-form.text-input type="email" name="email" label="E-mail" placeholder="E-mail" required />
            <x-form.text-input type="password" name="password" label="Senha" placeholder="Senha" required />
            <x-form.text-input type="password" name="password_confirmation" label="Confirmar senha"
                placeholder="Confirmar senha" required />

            <div class="inputArea">
                <x-form.botao name="Entrar" type="submit" />
                <x-form.botao colorButton="btn btn-secondary" name="Cancelar" type="reset" />
            </div>
        </form>
    </section>

</x-layout>

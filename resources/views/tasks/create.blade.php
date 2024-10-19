<x-layout page="Form create">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>
    <section id='create_task_section'>
        <h1>Criar tarefa</h1>
        <form method="POST" action="{{ route('task.create_action') }}">
            @csrf
            <x-form.text-input name="title" label="Título da Task" placeholder="Digite o título da tarefa" required />
            <x-form.text-input type="date" name="due_date" label="Data de realização" required />
            <x-form.select-input name="category_id" label="Categoria" required placeholder="Selecione uma categoria">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </x-form.select-input>
            <x-form.textarea-input name="description" label="Descrição"
                placeholder="Digite uma descrição para sua tarefa" required />
            <div class="inputArea">
                <x-form.botao name="Limpar" type="reset" colorButton="secondary" />
                <x-form.botao name="Criar tarefa" type="submit" />

            </div>
        </form>
    </section>

</x-layout>

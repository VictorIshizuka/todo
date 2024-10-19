<x-layout page="Form edit">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">Voltar</a>
    </x-slot:btn>
    <section id='create_task_section'>
        <h1>Editar tarefa</h1>
        <form method="POST" action="{{ route('task.put_action') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $task->id }}" />
            <x-form.checkbox-input name="is_done" label="Tarefa concluída?" checked="{{ $task->is_done }}" />
            <x-form.text-input name="title" label="Título da Task" placeholder="Digite o título da tarefa" required
                value="{{ $task->title }}" />
            <x-form.text-input type="datetime-local" name="due_date" label="Data de realização" required
                value="{{ $task->due_date }}" />

            <x-form.select-input name="category_id" label="Categoria" required placeholder="Selecione uma categoria">
                @foreach ($categories as $category)
                    <option value={{ $category->id }} @if ($category->id === $task->category_id) selected @endif>
                        {{ $category->title }}</option>
                @endforeach
            </x-form.select-input>
            <x-form.textarea-input name="description" label="Descrição"
                placeholder="Digite uma descrição para sua tarefa" required value="{{ $task->description }}" />
            <div class="inputArea">
                <x-form.botao name="Limpar" type="reset" colorButton="secondary" />
                <x-form.botao name="Atualizar tarefa" type="submit" />

            </div>
        </form>
    </section>

</x-layout>

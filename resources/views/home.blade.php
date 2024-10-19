<x-layout page="Todo">

    <x-slot:btn>
        <a href="{{ route('task.create') }}" class="btn btn-primary">Criar tarefa</a>
        <a href="{{ route('logout_action') }}" class="btn btn-secondary">Sair</a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph__header">
            <h2>Progresso do Dia</h2>
            <div class="graph_header_line"></div>
            <div class="graph_header_date">
                <a href="{{ route('home', ['date' => $date_prev_button]) }}">
                    < </a>
                        {{ $date_as_string }}
                        <a href="{{ route('home', ['date' => $date_next_button]) }}">
                            > </a>
            </div>
        </div>
        <div class="graph_header_subtitle">Tarefas: <b id="task-count">{{ $undone_tasks_count }} /
                {{ $tasks_count }}</b>
        </div>
        <div class="graph_placeholder"></div>
        <div class="tasks_left_footer">
            <img src="/assets/images/icon-info.png" />Restam {{ ' __ ' }}<span id="undone-tasks-count">
                {{ $undone_tasks_count }}
            </span>{{ ' __ ' }} tarefas para serem realizadas.
        </div>
    </section>
    <section class="list">
        <div class="list-header">
            <select class="list_header_select" onchange="chnageTaskStatusFilter(this)">
                <option value="all_task">Todas as tarefas</option>
                <option value="task_pending">Tarefas pendentes</option>
                <option value="task_done">Tarefas realizadas</option>
            </select>
        </div>
        <div class="task_list">
            @foreach ($tasks as $task)
                <x-task :data=$task />
            @endforeach
        </div>
    </section>


    <script>
        async function taskUpdate(element) {
            let status = element.checked;
            let taskId = element.dataset.id;
            let url = "{{ route('task.update') }}"; // Corrigir a URL

            try {
                let result = await fetch(url, {
                    method: 'POST',
                    headers: {
                        "Content-type": "application/json",
                        "accept": "application/json"
                    },
                    body: JSON.stringify({
                        status,
                        taskId,
                        _token: "{{ csrf_token() }}"
                    })
                });

                result = await result.json();
                if (result.success) {
                    // alert("Tarefa atualizada com sucesso");
                } else {
                    element.checked = !status;
                }
            } catch (error) {
                console.error('Erro ao atualizar a tarefa:', error);
                element.checked = !status; // Reverter checkbox em caso de erro
            }
        }
    </script>

</x-layout>

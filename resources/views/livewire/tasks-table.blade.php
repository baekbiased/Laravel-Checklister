<div>
    <table class="table table-striped" wire:sortable="updateTaskOrder">
        <tbody>
        @forelse($tasks as $task)
            <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                <td>{{ $task->position }}.</td>
                <td>{{ $task->name }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}">Edit</a>
                    <form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm( '{{ __('Are you sure?') }}' )"
                                type="submit">{{__('Delete')}}</button>
                    </form>

                </td>
            </tr>
        @empty
            <p class="text-center">No tasks available</p>
        @endforelse
        </tbody>
    </table>

</div>

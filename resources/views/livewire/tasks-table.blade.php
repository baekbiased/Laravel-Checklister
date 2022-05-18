<div>
    <table class="table table-striped" >
        <tbody>
        @forelse($tasks as $task)
            <tr>
                <td>
                    @if( $task->position > 1 )
                    <button class="btn" wire:click.prevent="task_up({{ $task->id }})">&uarr;</button>
                    @endif

                    @if( $task->position < $tasks->max('position') )
                    <button class="btn" wire:click.prevent="task_down({{ $task->id }})">&darr;</button>
                    @endif
                </td>
{{--                <td>{{ $task->position }}.</td>--}}
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

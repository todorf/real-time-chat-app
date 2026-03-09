@if (isset($conversation))
    <form action="{{ route('conversations.update', $conversation->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('forms._input_text', [
            'name' => 'name',
            'placeholder' => 'Enter conversation name',
            'value' => $conversation->name,
            'type' => 'text',
        ])

        @include('forms._input_select', [
            'name' => 'type',
            'placeholder' => 'Select Type',
            'selected' => $conversation->type,
            'options' => \App\Enums\TypeOptions::getSelectOptions(),
        ])

        <br>

        <div>
            <a href="{{ route('conversations.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary float-end">Update Conversation</button>
        </div>
    </form>
@else
    <form action="{{ route('conversations.store') }}" method="POST">
        @csrf
        @include('forms._input_text', [
            'name' => 'name',
            'placeholder' => 'Enter conversation name',
            'type' => 'text',
        ])

        @include('forms._input_select', [
            'name' => 'type',
            'placeholder' => 'Select Type',
            'selected' => '',
            'options' => \App\Enums\TypeOptions::getSelectOptions(),
        ])

        <br>

        <div>
            <a href="{{ route('conversations.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary float-end">Create Conversation</button>
        </div>
    </form>
@endif
@if (isset($conversation))
    <form action="{{ route('conversations.update', $conversation->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('forms.__input_text', [
            'name' => 'name',
            'placeholder' => 'Enter conversation name',
            'value' => $conversation->name,
            'type' => 'text',
        ])

        @include('forms.__input_select', [
            'name' => 'type',
            'placeholder' => 'Select Type',
            'selected' => $conversation->type,
            'options' => \App\Enums\TypeOptions::getSelectOptions(),
        ])

        <br>
        <button type="submit">Update Conversation</button>
    </form>
@else
    <form action="{{ route('conversations.store') }}" method="POST">
        @csrf
        @include('forms.__input_text', [
            'name' => 'name',
            'placeholder' => 'Enter conversation name',
            'type' => 'text',
        ])

        @include('forms.__input_select', [
            'name' => 'type',
            'placeholder' => 'Select Type',
            'selected' => '',
            'options' => \App\Enums\TypeOptions::getSelectOptions(),
        ])

        <br>
        <button type="submit">Create Conversation</button>
    </form>
@endif
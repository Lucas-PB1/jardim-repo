<x-timeline-layout>
    <h1>Timeline RPG</h1>
    <ul>
        @foreach ($data as $item)
            <li style="--accent-color:#41516C">
                <img src="{{ url($item->destaque->path) }}" alt="destaque-{{ $item->id }}" width="100%">
                <div class="date">{{ $item->data }}</div>
                <div class="title">{{ $item->{'nome-do-evento'} }}</div>
            </li>
        @endforeach
    </ul>
</x-timeline-layout>

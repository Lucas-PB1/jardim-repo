<x-timeline-layout>
    <h1>{{ $data->{'nome-do-evento'} }}</h1>
    <div class="container text-center">
        <img src="{{ url($data->destaque->path) }}" alt="destaque-{{ $data->id }}" width="50%">
        <div>{{ $data->texto }}</div>
    </div>
</x-timeline-layout>

@php $route = !isset($data) ? route('galeria.store') : route('galeria.update', $data->id) @endphp

<form action="{{ $route }}" method="post" enctype="multipart/form-data">
    @csrf

    @isset($data)
        @method('PUT')
    @endisset

    {{-- @dd($data->destaque); --}}

    <div class="row ms-0">
        <div class="row">
            <x-generator.input id="imagem-principal" titulo="Imagem de Fundo" size="6" tipo='file'
                :dados="isset($data) ? $data->destaque : null" mandatory="true" />
        </div>

        <x-generator.input id="nome-da-galeria" titulo="Nome da Galeria" size="6" tipo='text'
            dados="{{ isset($data) ? $data->{'nome-da-galeria'} : null }}" placeholder="Nome da Galeria" />

        <x-generator.input id="icone" titulo="Ícone" size="6" tipo='text'
            dados="{{ isset($data) ? $data->{'icone'} : null }}" />
    </div>
    <div class="p-3">
        <button class="btn btn-primary" type="submit">
            Enviar
        </button>
    </div>
</form>
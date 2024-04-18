<form action="{{ route('config.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row ms-0">
        <div class="row">
            @php $logo = getConf($config, 'logo') @endphp
            <x-generator.input :id="$logo->slug" :titulo="$logo->nome" size="6" tipo='file'
                :dados="isset($logo->destaque) ? $logo->destaque : null" />
        </div>

        <div class="row">
            @php $nomeSite = getConf($config, 'nome-do-site') @endphp
            <x-generator.input :id="$nomeSite->slug" :titulo="$nomeSite->nome" size="6" tipo='text'
                dados="{{ isset($nomeSite) ? $nomeSite->{'valor'} : null }}" placeholder="Insira o Nome" />
        </div>

        <div class="row">
            @php $cnpj = getConf($config, 'cnpj') @endphp
            <x-generator.input :id="$cnpj->slug" :titulo="$cnpj->nome" size="6" tipo='text'
                dados="{{ isset($cnpj) ? $cnpj->{'valor'} : null }}" placeholder="00.000.000/0000-00" classes="cnpj" />
        </div>

        <div class="row">
            @php $telefoneSuporte = getConf($config, 'telefone-de-contato') @endphp
            <x-generator.input :id="$telefoneSuporte->slug" :titulo="$telefoneSuporte->nome" size="6" tipo='text'
                dados="{{ isset($telefoneSuporte) ? $telefoneSuporte->{'valor'} : null }}" placeholder="(00) 00000-0000"
                classes="advanced_phone" />
        </div>

        <div class="row">
            @php $telefoneAlunos = getConf($config, 'telefone-para-alunos') @endphp
            <x-generator.input :id="$telefoneAlunos->slug" :titulo="$telefoneAlunos->nome" size="6" tipo='text'
                dados="{{ isset($telefoneAlunos) ? $telefoneAlunos->{'valor'} : null }}" placeholder="(00) 00000-0000"
                classes="advanced_phone" />
        </div>
    </div>
    <div class="p-3">
        <button class="btn btn-primary" type="submit">
            Enviar
        </button>
    </div>
</form>

<div class="tab-pane" id="galery">

    <form action="{{ route('galery.store', [$table, $id]) }}" class="dropzone" id="dropzone">
        @csrf
    </form>

    <div class="row" id="galeria"> </div>

    @section('scripts')
        <script>
            chargeGalery("{{ $table }}", {{ $id }})
        </script>
    @endsection
</div>


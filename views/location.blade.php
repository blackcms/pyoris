@php Theme::layout('no-sidebar') @endphp
@php Theme::set('section-name', $location->name) @endphp

<div class="p-4">
    @if ((count($files) > 0 && count($properties) < 1))
        @foreach ($files as $key => $file)
            <h3>
                Lista file {{ $key }}
            </h3>
            <div class="mx-0 mb-2">
                <div class="col-12 card table-responsive">
                    <table class="table">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome file</th>
                                <th scope="col">Estensione</th>
                                @if ($key == 'annunci')
                                    <th scope="col">Numero annunci</th>
                                @endif
                                <th scope="col">Data</th>
                                <th scope="col">Azione</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($file as $index => $filePath)
                                <tr>
                                    <td>
                                        {{ md5(basename($filePath)) }}
                                        @if ($index == 0)
                                            <code class="ml-2 rounded p-1 bg-primary text-white">last</code>
                                        @endif
                                    </td>
                                    <td>
                                        {{ basename($filePath) }}
                                    </td>
                                    <td>{{ ucfirst(pathinfo($filePath, PATHINFO_EXTENSION)) }}</td>
                                    @if ($key == 'annunci')
                                        <td>
                                            {{ count($annunci['content'][$index]) }}
                                        </td>
                                    @endif
                                    <td> {{ str_replace('_', '/', pathinfo($filePath, PATHINFO_FILENAME)); }}</td>
                                    <td>
                                        <a href="/{{$filePath}}" download>
                                            <button class="btn btn-primary">
                                                <i class="fa fa-download"></i>
                                            </button>
                                        </a>
                                        @if ($key == 'annunci')
                                            <a target="_blank" href="?annunci={{ md5($filePath) }}">
                                                <button class="btn btn-primary text-white">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    @endif

    @if (isset($properties) && (count($properties) > 0))
        <h3>
            Annunci ({{ count($properties) }})
        </h3>
        <hr>
        @foreach ($properties as $property)
            <div class="card mb-2">
                <div class="card-body">
                    <header class="post__header">
                        <h3 class="post__title">
                            {{ $property['titolo'] }}
                        </h3>
                    </header>
                    <div>
                        <p class="m-0">
                            Prezzo: {{ $property['citta'] }}
                        </p>
                        <p class="m-0">
                            Prezzo: {{ $property['prezzo'] }}
                        </p>
                        <p class="m-0">
                            Url: <a target="_blank" class="text-info" href="{{ $property['url'] }}">{{ $property['url'] }}</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

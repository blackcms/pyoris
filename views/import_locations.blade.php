<div class="container">
    <div class="card p-3">
        @if (auth()->user() && auth()->user()->hasPermission('locations.create'))
            <a target="_blank" href="/{{ strtolower(trans('addons/seapp::base.menu_name')) }}/{{ strtolower(trans('addons/seapp::locations.menu_name')) }}/import">
                <button class="btn btn-primary p-3 mb-4">
                    <i class="fa fa-download"></i> Import {{ strtolower(trans('addons/seapp::locations.menu_name')) }}
                </button>
            </a>
            @if (count($zone) > 0)
                <a target="_blank" href="/{{ strtolower(trans('addons/seapp::base.menu_name')) }}/{{ strtolower(trans('addons/seapp::locations.menu_name')) }}/update/delta">
                    <button class="btn btn-primary p-3 mb-4">
                        <i class="fa fa-refresh"></i> Update delta of {{ strtolower(trans('addons/seapp::locations.menu_name')) }}
                    </button>
                </a>
            @endif
        @endif

        <h1 class="text-decoration-underline pb-2">Script importare zone e quartieri (Immoveo)</h1>

        <div class="mb-4">
            <i class="bg-success p-1 rounded text-white fa fa-check"></i> Imported now
            |
            <i class="bg-danger p-1 rounded text-white fa fa-times"></i> Already imported
            <hr>
        </div>

        @foreach($zone as $zona)
            <h2>
                @if ($zona[1])
                    <i class="bg-success p-1 rounded text-white fa fa-check"></i>
                @else
                    <i class="bg-danger p-1 rounded text-white fa fa-times"></i>
                @endif
                ID: {{$zona[0]->id}} - {{$zona[0]->name}}
            </h2>

            <ul>
                @foreach($quartieri as $quartiere)

                    @if ($quartiere[0]->parent_id != $zona[0]->id)
                        @continue
                    @endif

                    <li class="p-2">
                        @if ($quartiere[1])
                            <i class="bg-success p-1 rounded text-white fa fa-check"></i>
                        @else
                            <i class="bg-danger p-1 rounded text-white fa fa-times"></i>
                        @endif
                        ID: {{$quartiere[0]->id}} - {{$quartiere[0]->name}}
                    </li>
                @endforeach
            </ul>

            <hr>
        @endforeach
    </div>
</div>

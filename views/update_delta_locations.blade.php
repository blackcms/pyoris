<div class="container">
    <div>
        <h1 class="text-decoration-underline pb-2">Result update delta of locations (<?= count(
            $locations
        ) ?>)</h1>
    </div>
    @foreach($locations as $location)
        <div class="card p-3 mb-2">
            <h2 class="text-info">
                Roma /
                <a href="/{{ strtolower(trans('addons/seapp::locations.menu_name')) }}/{{$location['zona']}}" class="btn btn-primary text-white mb-2">{{$location['zona']}}</a> /
                <a href="/{{ strtolower(trans('addons/seapp::locations.menu_name')) }}/{{$location['quartiere']}}"class="btn btn-primary text-white mb-2">{{$location['quartiere']}}</a>
            </h2>

            Delta 100: {{$location['delta_100']}}
            <br>
            Delta 150: {{$location['delta_150']}}
            <br>
            Delta 200: {{$location['delta_200']}}
            <br>
            Delta 250: {{$location['delta_250']}}
        </div>
    @endforeach
</div>

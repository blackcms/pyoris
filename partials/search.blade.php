<h1 class="text-dark search-result-title">{{ __('Search result') }}: </h1>
@if (count($locations) > 0)
    <div class="search-list">
        <div class="row">
            @foreach ($locations as $post)
                <div class="col-md-4 col-sm-6 col-12">
                    <a href="{{ $post->url }}" class="squared has-image">
                        <span class="img" style="background-image: url({{ MediaManagement::getImageUrl($post->image, 'thumb') }});"></span>
                        <span class="spoofer">{{ $post->name }}</span>
                        <span class="visible">{{ $post->name }}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@else
    <p>{{ __('No result available for :name', ['name' => 'posts']) }}</p>
@endif

<div class="max-w-4xl sm:px-6 lg:px-8 mb-4 py-2 bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
    <div class="text-gray-900">
        <h3>Popular Tags</h3>
    </div>

    {{-- Tags --}}
    <div class="mt-2 flex">
        @foreach ($tags as $tag)
            <a href="{{ route('tag', $tag->slug) }}">
                <span
                    class="bg-{{ $tag->color }}-100 text-{{ $tag->color }}-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-{{ $tag->color }}-200 dark:text-{{ $tag->color }}-800">{{ $tag->name_tag }}</span>
            </a>
        @endforeach
    </div>
</div>

<div class="max-w-4xl sm:px-6 lg:px-8 mb-4 py-2 bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
    <div class="text-gray-900">
        <h3>Popular Tags</h3>
    </div>

    {{--  need corrections --}}
    {{-- Tags --}}
    <div class="mt-2 flex">
        @foreach ($tags as $tag)
            <a href="{{ route('tag', $tag->slug) }}">
                <span
                    class="bg-{{ $tag->color }}-100 text-{{ $tag->color }}-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-{{ $tag->color }}-200 dark:text-{{ $tag->color }}-800">{{ $tag->name }}</span>
            </a>
        @endforeach
        {{-- <a href="#">
            <span
                class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">Defaulsdvsdvsvsdvdt</span>
        </a>

        <a href="#">
            <span
                class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Green</span>
        </a>

        <a href="#">
            <span
                class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">Yellow</span>
        </a> --}}
    </div>
</div>

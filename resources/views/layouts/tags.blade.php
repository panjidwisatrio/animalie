<div class="flex-col space-y-4 items-center mx-4 sm:mx-0">
    <div
        class="py-6 px-8 items-center rounded-lg shadow-lg overflow-hidden w-full sm:w-11/12 md:max-w-md hover:shadow-xl bg-white dark:bg-cyan-900">
        <div class="flex flex-row justify-start items-center">
            <h1 class="text-md sm:text-xl font-bold text-gray-800 mr-2 dark:text-gray-100">Popular Tags</h1>
        </div>

        <div class='my-3 flex flex-wrap -m-1'>
            @foreach ($tags as $tag)
            <a href="{{ route('post.tag', $tag->slug) }}">
                <span
                    class="m-1 flex flex-wrap justify-between items-center text-xs sm:text-sm bg-{{ $tag->color }}-100 text-{{ $tag->color }}-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-{{ $tag->color }}-200 dark:text-{{ $tag->color }}-800 rounded-md py-1 px-2 font-semibold leading-loose cursor-pointer dark:text-gray-300">
                    {{ $tag->name_tag }}
                </span>
            </a> 
            @endforeach

        </div>
    </div>
</div>

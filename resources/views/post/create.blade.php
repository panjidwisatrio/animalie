<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start items-center">
            <div class="rounded-full bg-cyan-900 p-2 text-white">
                <i data-feather="edit-3"></i>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ml-2">
                {{ __('Create New Post') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-0 md:py-12 lg:py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('post.store') }}">
                        @csrf
                        <!-- Title -->
                        <div class=" mt-4 grid-cols-2">
                            <x-input-label for="title" :value="__('Title')" />

                            <x-text-input id="title" class="block mt-1 w-full font-medium text-sm" type="text"
                                name="title" :value="old('title')" placeholder="Input title" required autofocus />

                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Slug -->
                        <div class=" mt-4 grid-cols-2">
                            <x-input-label for="slug" :value="__('Slug')" />

                            <x-text-input id="slug" class="block mt-1 w-full font-medium text-sm" type="text"
                                name="slug" :value="old('slug')"
                                placeholder="Slug will automatically generate when you finished fill the title"
                                readonly />

                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                        </div>

                        <!-- Categories -->
                        <div class="mt-4">
                            <x-input-label for="category_id" :value="__('Categories')" />
                            <div class="flex-shrink w-full inline-block relative" id="category_id">
                                <select
                                    class="block font-medium text-sm text-green-900 w-full bg-emerald-100 border-gray-300 focus:border-green-400 shadow-inner px-4 py-2 pr-8 rounded-md"
                                    id="category_id" name="category_id">
                                    <option selected>Choose category post</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Tag -->
                        <div class="mt-4 grid-cols-2">
                            <x-input-label for="tags" :value="__('Tags')" />

                            <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                                data-dropdown-placement="bottom"
                                class="select-tag w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                type="button">Choose tag post <svg class="ml-2 w-4 h-4" aria-hidden="true"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownSearch"
                                class="hidden z-10 w-60 bg-white rounded shadow-lg dark:bg-gray-700">
                                <div
                                    class="p-3 flex items-center p-3 text-sm font-medium text-blue-600 bg-gray-50 border-t border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                    <label for="input-group-search" class="sr-only">Search</label>
                                    <div class="relative">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <input type="text" id="input-search-tag"
                                            class="block p-2 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Search tag">
                                    </div>
                                </div>

                                <ul class="overflow-y-auto px-3 pb-3 h-48 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownSearchButton" id="item-tags">
                                    <div id="items-tags">
                                        @foreach ($tags as $tag)
                                            <li>
                                                <div
                                                    class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <input id="checkbox-item-11" name="tags[]" type="checkbox"
                                                        value="{{ $tag->id }}"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="checkbox-item-11"
                                                        class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $tag->name_tag }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </div>
                                </ul>

                                <div
                                    class="p-3 flex items-center p-3 text-sm font-medium text-blue-600 bg-gray-50 border-t border-gray-200 dark:border-gray-600 hover:bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600">
                                    <label for="input-group-search" class="sr-only">Add</label>
                                    <div class="relative">
                                        <div
                                            class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m6 20l1-4H3.5l.5-2h3.5l1-4h-4L5 8h4l1-4h2l-1 4h4l1-4h2l-1 4h3.5l-.5 2h-3.5l-1 4h4l-.5 2h-4l-1 4h-2l1-4H9l-1 4Zm3.5-6h4l1-4h-4Z" />
                                            </svg>
                                        </div>
                                        <input type="hidden" id="input-tag-slug"
                                            class="block p-2 pl-10 w-full text-sm text-blue-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Slug Tag">
                                        <input type="text" id="input-add-tag"
                                            class="block p-2 pl-10 w-full text-sm text-blue-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Add New Tag">
                                    </div>
                                    <button type="button"
                                        class="add-tag-button ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                </div>
                            </div>
                        </div>

                        <!-- Text Editor -->
                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Body')" />
                            <div class="mt-1">
                                <textarea id="content" name="content" rows="10" cols="80" placeholder="Write your first post here!"
                                    data-editor="ClassicEditor"></textarea>
                            </div>

                            <div class="mt-4 -mr-1 flex justify-end">
                                <x-primary-button class="ml-3">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $('#input-search-tag').on('keyup', function() {
            $.ajax({
                type: 'get',
                url: "{{ route('tag.search') }}",
                data: {
                    'query': $(this).val(),
                },
                success: function(data) {
                    $('#items-tags').html('');
                    data.tags.forEach(tag => {
                        $('#items-tags').append(`
                            <li>
                                <div class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="checkbox-item-11" name="tags[]" type="checkbox"
                                        value="${tag.id}"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="checkbox-item-11"
                                        class="py-2 ml-2 w-full text-sm font-medium text-gray-900 rounded dark:text-gray-300">${tag.name_tag}</label>
                                </div>
                            </li>
                        `);
                    });
                },
                error: function(response) {
                    console.log(response);
                }
            });
        })

        $(document).on('click', '.add-tag-button', function(e) {
            e.preventDefault();
            const inputAddTag = document.querySelector('#input-add-tag');

            $.ajax({
                url: "{{ route('tag.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name_tag": $('#input-add-tag').val(),
                },
                success: function(response) {
                    $('#item-tags').load(' #item-tags');
                    inputAddTag.value = '';
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>

    @section('scripts')
        <script>
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            title.addEventListener('change', function() {
                fetch('/post/create/checkSlug?title=' + title.value, {})
                    .then(response => response.json())
                    .then(data => slug.value = data.slug)
            })

            // tambah route baru untuk ke method baru untuk updload image
            ClassicEditor
                .create(document.querySelector('#content'), {
                    ckfinder: {
                        uploadUrl: '{{ route('post.upload', ['_token' => csrf_token()]) }}',
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endsection
</x-app-layout>

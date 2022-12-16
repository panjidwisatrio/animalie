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

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('post.store') }}">
                        @csrf
                        <!-- Title -->
                        <div class=" mt-4 grid-cols-2">
                            <x-input-label for="title" :value="__('Title')" />

                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required autofocus />

                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Slug -->
                        <div class=" mt-4 grid-cols-2">
                            <x-input-label for="slug" :value="__('Slug')" />

                            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug"
                                :value="old('slug')" required autofocus />

                            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                        </div>

                        <!-- Categories -->
                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Categories')" />
                            <div class="flex-shrink w-full inline-block relative">
                                <select
                                    class="block font-medium text-sm text-green-900 w-full bg-emerald-100 border-gray-300 focus:border-green-400 shadow-inner px-4 py-2 pr-8 rounded-md">
                                    <option value="-1">choose ...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Image input -->
                        {{-- <div class="mt-4">
                            <x-input-label for="images" :value="__('Images')" />
                            <div class="">
                                <input
                                    class="px-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-emerald-100 dark:text-gray-400 focus:border-green-400 "
                                    id="images" name="images" type="file" multiple>
                            </div>
                        </div> --}}

                        <!-- Text Editor -->
                        <div class="mt-4">
                            <x-input-label for="body" :value="__('Body')" />
                            <div class="mt-1">
                                <textarea id="editor" name="body" rows="10" cols="80" placeholder="Write your first post here!"></textarea>
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
    @section('scripts')
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    ckfinder: {
                        uploadUrl: '{{ route('post.upload', ['_token' => csrf_token()]) }}',
                    }
                })
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endsection
</x-app-layout>

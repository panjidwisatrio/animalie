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
                    <form method="POST" action="">
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
                                    <option>choose ...</option>
                                    <option>English</option>
                                    <option>France</option>
                                    <option>Spanish</option>
                                </select>
                            </div>
                        </div>

                        <!-- Image input -->
                        <div class="mt-4">
                            <x-input-label for="images" :value="__('Images')" />
                            <div class="">
                                <input
                                    class="py-2 px-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-emerald-100 dark:text-gray-400 focus:border-green-400 "
                                    id="images" name="images" type="file" multiple>
                            </div>
                        </div>

                        <!-- Text Editor -->

                        <div class="mt-4">
                            <x-input-label for="body" :value="__('Body')" />
                            @include('components.text-editor')
                        </div>

                        <div class="mt-4 -mr-1 flex justify-end">
                            <x-primary-button class="ml-3">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

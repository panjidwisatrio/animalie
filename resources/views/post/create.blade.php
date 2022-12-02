<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Post') }}
        </h2>
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

                        <!-- Slug -->
                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Categories')" />
                            <div class="flex-shrink w-full inline-block relative">
                                <select
                                    class="block font-medium text-sm text-green-900 w-full bg-white border-gray-300 focus:border-green-400 shadow-inner px-4 py-2 pr-8 rounded-md">
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
                                    class="py-2 px-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-white dark:text-gray-400 focus:border-green-400 "
                                    id="images" name="images" type="file" multiple>
                            </div>
                        </div>

                        <!-- Text Editor -->
                        
                        <div class="mt-4">
                            <x-input-label for="body" :value="__('Body')" />
                            @include('components.text-editor')
                        </div>

                        <div class="mt-4 -mr-1 flex justify-end">
                            <button type='submit'
                                class="bg-lime-300 text-green-700 font-medium py-1 px-4 rounded-lg tracking-wide mr-1"
                                value='Submit'>Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('What\'s on your mind?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>
        </form>
    </div>
    <h1 class="m-auto text-center text-2xl">Liste des catégories</h1>
    <div class="m-auto mt-6 max-w-2xl bg-white shadow-sm rounded-lg divide-y">
        @foreach ($categories as $category)
            <div class="p-6 flex space-x-2">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $category->user->name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{ $category->created_at->format('j M Y, g:i a') }}</small>
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $category->message }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
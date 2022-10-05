<x-app-layout>
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Bras-droit')
    <div class="max-w-lg mx-auto mt-24">
        <h1 class="text-4xl font-bold text-center">
            Gestion des images
        </h1>
    </div>
    <image-uploader></image-uploader>
    <!-- component -->
    <div class="mt-8">
        <h3 class="text-2xl font-medium text-center">Liste des Photos</h3>
    </div>
    <div class="overflow-x-auto">
        <div class="min-w-screen min-h-screen bg-gray-100 items-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-3/4 m-auto">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Date</th>
                                <th class="py-3 px-6 text-left">Image</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Publish</th>
                                <th class="py-3 px-6 text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <table-line></table-line>
                            @foreach($gallerie as $image)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{date('d-m-Y', strtotime($image->created_at))}}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img src="/storage/images/{{$image->name}}" class="w-6 h-6 rounded-full transform hover:scale-1110">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Publié</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex items-center justify-center">
                                            <input type="radio" name="" id="">
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <a href="#" class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
    <p>Non autorisé</p>
    @endif
</x-app-layout>
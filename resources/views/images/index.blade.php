<x-app-layout>
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Bras-droit')
    <div class="max-w-lg mx-auto mt-24">
        <h1 class="text-4xl font-bold text-center">
            Gestion des images
        </h1>
    </div>
        <div class="container">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Il y'a un soucis avec l'ajout de l'image<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif  
            <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <br/>
                        <input type="file" name="image" class="image">
                    </div>
                    <div class="col-md-12">
                        <br/>
                        <button type="submit" class="btn btn-success">Upload Image</button>
                    </div>
                </div>
            </form>
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
                                        <th class="py-3 px-6 text-left">Id</th>
                                        <th class="py-3 px-6 text-left">Image</th>
                                        <th class="py-3 px-6 text-center">Categorie</th>
                                        <th class="py-3 px-6 text-center">Publié</th>
                                        <th class="py-3 px-6 text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @foreach($images as $image)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{ $image['id'] }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left cursor-pointer" data-modal-toggle="popup-modal-{{ $loop->index }}">
                                                <div class="flex items-center">
                                                    <div class="mr-2">
                                                        <img src="/images/thumbnail/{{ $image['name'] }}" class="w-6 h-6 rounded-full transform hover:scale-1110">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $image['category'] }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex items-center justify-center">
                                                    <input type="radio" name="" id="">
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <form action="{{ route('image.destroy', ['id' => $image['id']]) }}" method="post" class="flex item-center justify-center">
                                                    @csrf
                                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        <div id="popup-modal-{{ $loop->index }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full justify-center items-center" aria-hidden="true">
                                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal-{{ $loop->index }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal -{{ $loop->index }}</span>
                                                    </button>
                                                    <div class="container">
                                                        <img src="/images/standard/{{ $image['name'] }}" class="" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    <p>Non autorisé</p>
    @endif
    <script>
        function displayNone() {
            console.log('clicked');
        }
    </script>
</x-app-layout>
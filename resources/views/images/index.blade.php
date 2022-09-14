<x-app-layout>
    @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Bras-droit')
    <div class="max-w-lg mx-auto mt-24">
        <h1 class="text-4xl font-bold text-center">
            Gestion des images
        </h1>
    </div>
    <image-uploader></image-uploader>
    @else
    <p>Non autorisé</p>
    @endif
</x-app-layout>
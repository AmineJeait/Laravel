<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Vous etes connecté") }}
                    @isset($op)
                    @if ($op )
                        <p>Votre Transaction a abouti !</p>
                    @endif
                    @endisset
                </div>
            </div>
        </div>
    </div>
    
    @section('parent')
    <div class="relative overflow-x-auto">
        
        @isset($depots,$somme)

            <table class="w-full text-sm text-left rtl:text-right text-gray-900 dark:text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Montant (en DHS) </th>
                        <th scope="col" class="px-6 py-3">Frais</th>
                        <th scope="col" class="px-6 py-3" >Date</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($depots as $depot)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-900">
                        <td class="px-6 py-4">{{$depot->id}}</td>
                        <td class="px-6 py-4">{{$depot->Montant}}</td>

                        <td class="px-6 py-4">{{$depot->frais}}</td>
                        <td class="px-6 py-4">{{$depot->created_at}}</td>
                    </tr>     
                @endforeach
                    
                </tbody>
                
            </table>
            <p>VL actuel : {{$VL}} </p>
            <p>Total : {{$somme}} DHS</p>
            <p>Total aprés frais : {{$apresfrais}} DHS </p>

        @endisset
        
    </div>
    @show
    <div class="content">
        
        @yield('content')
    </div>
    

    

    {{-- <a href="{{ route('form') }}">Acheter des actions ?</a> --}}   
</x-app-layout>








<style>


    
.form form{
    display:flex;
    flex-direction: column;
    width:40%;
    text-align: left;
    margin :2% auto;
}
    
p{
    text-align: center;
}

</style>



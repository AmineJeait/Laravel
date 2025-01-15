@extends('dashboard')


@section('content')



<table class="w-full text-sm text-left rtl:text-right text-gray-900 dark:text-gray-600">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-600">
        <tr>
            <th scope="col" class="px-6 py-3">No</th>
            <th scope="col" class="px-6 py-3">Montant (en DHS) </th>
            <th scope="col" class="px-6 py-3">Type</th>
            <th scope="col" class="px-6 py-3" >Date</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($historiques as $historique)
        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-900">
            <td class="px-6 py-4">{{$historique->id}}</td>
            <td class="px-6 py-4">{{$historique->Montant}}</td>
            <td class="px-6 py-4">{{$historique->type}}</td>
            <td class="px-6 py-4">{{$historique->created_at}}</td>
        </tr>     
    @endforeach
        
    </tbody>
    
</table>


@endsection
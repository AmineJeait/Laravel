
@extends('dashboard')



@section('content')  
    <div class="form">
         <label for="">Valeur liquidative actuel : {{$VL}} DHS </label>
        <p>La valeur liquidative est la valeur de l'action de l'opcvm</p>
        <p>Cette valeur peu augmenter ou diminuer en fonction des invesstissements , c'est comme ça que se font les transations</p>
        <form  action="{{route(name:('form'))}}" method="POST">
            @csrf <!-- {{ csrf_field() }} -->
            <label for="">Combien d'actions voulez vous acheter ?</label>
            {{-- <select name="montant" id="">
                <option value = "1" >1</option>
                <option value="10" {{ old('name','montant')=='10' ? 'selected' : '10'  }}>10</option>
            </select> --}}


            <select name="montant" id="number">
                @foreach ($numbers as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
            <br>
            <p>Votre total est <span id="result">0</span>DHS</p>
            <br>
            <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="submit">Confirmer</button>
        </form>
    </div>



    <script>


        let multiplier = {{ $VL }};
        
        document.getElementById('number').addEventListener('change', function () {
            let selectedValue = parseInt(this.value);  // Get selected number
            let result = selectedValue * multiplier;   // Multiply by PHP variable
            document.getElementById('result').textContent = result;  // Update result
        });

        // Optional: Show initial result based on the first option
        window.addEventListener('load', function () {
            let selectedValue = parseInt(document.getElementById('number').value);
            document.getElementById('result').textContent = selectedValue * multiplier;
        });

    </script>

@endsection




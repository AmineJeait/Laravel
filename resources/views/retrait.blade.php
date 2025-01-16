@extends('dashboard')

@section('content')

<div class="form">
    <form action="{{ route('retrait') }}" method="POST">
        @csrf <!-- {{ csrf_field() }} -->
        <p>VL actuel : {{$VL}} </p>
        <p>Des frais de gestion (2%) seront déduits  </p>    
        <label for="number">Sélectionner le numéro du dépôt</label>
        <select name="montant" id="number">
            @foreach ($depots as $depot)
                <!-- Concaténer l'ID et le montant dans la valeur de l'option -->
                <option value="{{ $depot->id }}-{{ $depot->Montant }}">{{ $depot->id }} - {{ $depot->Montant }} DHS</option>
            @endforeach
        </select>
        <br>
        <!-- Affichage du résultat -->
        <p>Votre total après frais est <span id="result">0</span> DHS</p>

        <!-- Champ caché pour envoyer le montant après frais -->
        <input type="hidden" name="montant_apres_frais" id="montant_apres_frais" value="0">
        
        <!-- Champ caché pour envoyer l'ID du dépôt sélectionné -->
        <input type="hidden" name="depot_id" id="depot_id" value="0">
        
        <br>
        <button class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="submit">Confirmer</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const resultSpan = document.getElementById('result');
        const montantApresFraisInput = document.getElementById('montant_apres_frais');
        const depotIdInput = document.getElementById('depot_id');

        // Frais de gestion (2%)
        const fraisDeGestion = 0.02;

        // Fonction pour calculer et afficher le total après frais
        function updateResult() {
            const selectElement = document.getElementById('number');
            let selectedOption = selectElement.options[selectElement.selectedIndex];  // Option sélectionnée
            let value = selectedOption.value;  // Valeur de l'option 
            let selectedId = value.split('-')[0];  // Extraire l'ID du dépôt
            let selectedMontant = parseFloat(value.split('-')[1]);  // Extraire le montant du dépôt

            if (!isNaN(selectedMontant)) {
                let frais = selectedMontant * fraisDeGestion;  // Calcul des frais (2% du montant)
                let result = selectedMontant - frais;  // Calcul du montant après frais
                resultSpan.textContent = result.toFixed(2);  // Met à jour l'affichage du résultat avec 2 décimales
                
                // Met à jour la valeur du champ caché pour envoyer le montant après frais dans le formulaire
                montantApresFraisInput.value = result.toFixed(2);
                
                // Met à jour la valeur du champ caché pour envoyer l'ID du dépôt dans le formulaire
                depotIdInput.value = selectedId;
            } else {
                resultSpan.textContent = '0';  // Si la valeur sélectionnée n'est pas valide
                montantApresFraisInput.value = '0';
                depotIdInput.value = '0';
            }
        }

        // Ajouter un écouteur d'événements pour changer la sélection
        document.getElementById('number').addEventListener('change', updateResult);

        // Optionnel : Afficher le résultat initial basé sur la première option
        let initialSelectElement = document.getElementById('number');
        let initialValue = initialSelectElement.value;
        let initialId = initialValue.split('-')[0];
        let initialMontant = parseFloat(initialValue.split('-')[1]);
        if (!isNaN(initialMontant)) {
            let frais = initialMontant * fraisDeGestion;  // Calcul des frais pour la première valeur
            let result = initialMontant - frais;
            resultSpan.textContent = result.toFixed(2);  // Mettre à jour l'affichage du résultat initial

            // Mettre à jour la valeur du champ caché pour le montant après frais
            montantApresFraisInput.value = result.toFixed(2);

            // Mettre à jour la valeur du champ caché pour l'ID du dépôt
            depotIdInput.value = initialId;
        }
    });
</script>

@endsection

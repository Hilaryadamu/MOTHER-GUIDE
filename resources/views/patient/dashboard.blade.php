<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
     
    <h1>Pregnancy Health Check</h1>

    <form action="/pregnancy-health-check" method="POST">
        @csrf

        <label for="blood_pressure">Blood Pressure:</label>
        <input type="number" name="blood_pressure" required><br>

        <label for="weight">Weight:</label>
        <input type="number" name="weight" required><br>

        <label for="pregnant_month">Pregnant Month:</label>
        <input type="number" name="pregnant_month" required><br>

        <label for="has_pain">Do you have any pain?</label>
        <select name="has_pain" required>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>

        <div id="pain_type_div" style="display: none;">
            <label for="pain_type">Kind of Pain:</label>
            <select name="pain_type">
                <option value="normal1">Normal 1</option>
                <option value="normal2">Normal 2</option>
                <option value="normal3">Normal 3</option>
                <option value="normal4">Normal 4</option>
                <option value="normal5">Normal 5</option>
                <option value="bad1">Bad 1</option>
                <option value="bad2">Bad 2</option>
                <option value="bad3">Bad 3</option>
                <option value="bad4">Bad 4</option>
                <option value="bad5">Bad 5</option>
            </select><br>
        </div>

        <button type="submit">Check Health</button>
    </form>

    <script>
        const hasPainSelect = document.querySelector('select[name="has_pain"]');
        const painTypeDiv = document.getElementById('pain_type_div');

        hasPainSelect.addEventListener('change', (event) => {
            if (event.target.value === 'yes') {
                painTypeDiv.style.display = 'block';
            } else {
                painTypeDiv.style.display = 'none';
            }
        });
    </script>


        </div>
    </div>
</x-app-layout>

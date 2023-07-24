<x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Health Track') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <!-- <x-application-logo /> -->

    
    <p class="mt-6 text-gray-500 leading-relaxed">
       Here you can track your own health at your self at home or anywere. If you have not have access to go the hospital at that time maybe you have a lot job to do at home as mother of family.So we can help you to track your health even you a at home.  
    </p>
</div>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
     
 
     <form  id="healthCheckForm"action="/tracks" method="POST">
         @csrf
         <div class="px-4 py-5 bg-white sm:p-6">
         <label for="blood_pressure" class="block font-medium text-sm text-gray-700">Blood Pressure:</label>
          <input type="number" name="blood_pressure" id="description" placeholder="eg: in mmHg" type="number" class="form-input rounded-md shadow-sm mt-1 block w-full" min='100' max='200'
                 required/>
             
               <p class="text-sm text-gray-600">Top number on your sphygmomanometer(kipima pressure ya damu):</p>
              
         </div>
         
    
         <div class="px-4 py-5 bg-white sm:p-6">
         <label for="weight"class="block font-medium text-sm text-gray-700">Weight:</label>
         <input type="number" name="weight" id="description" placeholder="eg: uzito wako" type="number" class="form-input rounded-md shadow-sm mt-1 block w-full" 
                 required/>
                
         </div>

         <div class="px-4 py-5 bg-white sm:p-6">
         <label for="pregnant_month"class="block font-medium text-sm text-gray-700">Pregnant Month:</label>
         <input type="number" name="pregnant_month" id="description" placeholder="una ujauzito wa miezi mingapi " type="number" class="form-input rounded-md shadow-sm mt-1 block w-full" min='1' max='9'
                 required/>
                 @error('description')
               <p class="text-sm text-red-600">{{ $message }}</p>
              @enderror
         </div>
         <div class="px-4 py-5 bg-white sm:p-6">
         <label for="has_pain" class="form-input rounded-md shadow-sm mt-1 block w-full">Do you have any pain?</label>
        <select name="has_pain"  class="form-input rounded-md shadow-sm mt-1 block w-full" required>
           <option value=""></option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br>
        </div>
        
        <div id="pain_type_div" style="display: none;" class="px-4 py-5 bg-white sm:p-6">
            <label for="pain_type" class="form-input rounded-md shadow-sm mt-1 block w-full">Kind of Pain:</label>
            <select name="pain_type" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                <option value="normal">Maumivu ya mgongo(Backaches):</option>
                <option value="normal">Maumivu ya Miguu(Leg Cramps):</option>
                <option value="normal">Maumivu ya Tumbo la Chini (Pelvic Pain):</option>
                <option value="normal">Kutulia na Kukaza kwa Uterasi (Braxton Hicks Contractions):</option>
                <option value="normal">Maumivu ya Mishipa ya Utezi (Round Ligament Pain):</option>
                <option value="bad">Kutokwa na damu au kuvuja kwa maji ya uzazi kabla ya wakati (Bleeding or Premature Rupture of Membranes):</option>
                <option value="bad">Maumivu ya kifua makali (Severe Chest Pain):</option>
                <option value="bad">Maumivu makali ya tumbo la chini  (Severe Lower Abdominal Pain):</option>
                <option value="bad">Maumivu makali au uvimbe wa miguu (Severe Leg Pain or Swelling):</option>
                <option value="bad">Kutokwa na damu kwenye ukeni (Vaginal Bleeding):</option>
            </select><br>
        </div>

         <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Check Health
                            </button>
         </div>
 
     </form>
 
     <script>
        const healthCheckForm = document.getElementById('healthCheckForm');
        const painTypeDiv = document.getElementById('pain_type_div');

        healthCheckForm.addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(healthCheckForm);

            fetch('/tracks', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: 'Health Check Result',
                    text: data.message,
                    icon: 'info'
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

        const hasPainSelect = document.querySelector('select[name="has_pain"]');

        hasPainSelect.addEventListener('change', (event) => {
            if (event.target.value === 'yes') {
                painTypeDiv.style.display = 'block';
            } else {
                painTypeDiv.style.display = 'none';
            }
        });
        
         
     </script>
 
 
    </div>
</x-app-layout>

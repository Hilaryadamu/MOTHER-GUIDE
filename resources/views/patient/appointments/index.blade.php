<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recently, Appointments') }}
        </h2>
    </x-slot>

    <div>
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
             <div class="block mb-8">
            
          
             <div class="flex items-center justify-end px-4 py-3 bg-white-50 text-right sm:px-6">
             <a href="{{ route('appointments.create') }}" ><button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button></a>
                        
             </div>

          
           

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <!-- <x-application-logo /> -->

    
    <p class="mt-6 text-gray-500 leading-relaxed">
       Here you can see your recently appointments with our doctor for different aspects , whether for your new born baby, your unborn baby or for your self as the pregnancy mother.
    </p>
</div>   
       
    </div>
</x-app-layout>
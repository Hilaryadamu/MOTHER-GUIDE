<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div>

    <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            
        </x-slot>
        <div class="card-header">Create SMS Reminder</div>
        <x-validation-errors class="mb-4" />
                                     
                      @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
            
            <form method="POST" action="{{ route('send-reminder') }}">
                            @csrf

                           
            <div class="mt-4">
            <label for="phone_number">Phone Number</label>
                <x-input  type="text" name="phone_number" id="phone_number"   class="block mt-1 w-full" placeholder="+255XXXXXXXXX" required  />
            </div>


            
            <div class="mt-4">
            <label for="message">Message</label> 
                <textarea name="message" id="message" class="block mt-1 w-full"  required ></textarea>
            </div>

            

            <div class="mt-4">
            <label for="reminder_date">Reminder Date</label>
                <x-input input type="date" name="reminder_date" id="reminder_date"  required class="block mt-1 w-full"   />
            </div>
            
           
            <div class="mt-4">
            <label for="reminder_time">Reminder Time</label>
                <x-input type="time" name="reminder_time" id="reminder_time"  required class="block mt-1 w-full"  />
            </div>

            
            
            

            <div class="flex items-center justify-end mt-4">
                
                <x-button  type="submit" class="ml-4">
                    {{ __('Send Reminder') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

      

    </div>
</x-app-layout>

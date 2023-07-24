<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create new appointment,') }}
        </h2>
    </x-slot>
     


    
    <div>

    
    <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            
        </x-slot>
        
        <x-validation-errors class="mb-4" />
                                     
                      @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
            
            <form action="{{ route('appointments.store') }}" method="POST">
                            @csrf

        
            <div class="mt-4">
            <label for="location">Location:</label>
            <select name="location" id="location" class="block mt-1 w-full" >
            <option value="">Select Location</option>
            @foreach ($locations as $location)
                <option value="{{ $location }}">{{ $location }}</option>
            @endforeach
        </select>
            </div>
          
            <div class="mt-4">
            <label for="hospital">Hospital:</label> 
            <select name="hospital" id="hospital" class="block mt-1 w-full" >
            <option value="">Select Hospital</option>
        </select>
            </div>
         
     <div class="mt-4">
            <label for="specialization">Specialization:</label>
            <select name="specialization" id="specialization"class="block mt-1 w-full">
            <option value="">Select Specialization</option>
            </select>
                
     </div>


    <div class="mt-4">
            <label for="doctor">Doctor Name:</label>
            <select type="text" name="doctor" id="doctor" class="block mt-1 w-full" >
            <option value="" class="block mt-1 w-full" >Select Doctor</option>
        </select>
                
     </div>
     
        <div class="mt-4">
            <label for="appointment_date">Appointment Date:</label>
                <x-input type="date" name="appointment_date" id="appointment_date"  class="block mt-1 w-full"   />
            </div>

            <div class="mt-4">
            <label for="appointment_time">Appointment Time:</label>
            <x-input type="time" name="appointment_time" id="appointment_time" required class="block mt-1 w-full"  />
            
            </div>
            
           
            <div class="mt-4">
            <label for="message">Message:</label>
                <textarea name="message" id="message"  required class="block mt-1 w-full"></textarea>
            </div>

            
            
            

            <div class="flex items-center justify-end mt-4">
                
                <x-button  type="submit" class="ml-4">
                    {{ __('Create Appointment') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

      


        <!-- View: appointments/create.blade.php -->
<!-- <form action="{{ route('appointments.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="location">Location:</label>
        <select name="location" id="location" class="form-control">
            <option value="">Select Location</option>
            @foreach ($locations as $location)
                <option value="{{ $location }}">{{ $location }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="hospital">Hospital:</label>
        <select name="hospital" id="hospital" class="form-control">
            <option value="">Select Hospital</option>
        </select>
    </div>

    <div class="form-group">
        <label for="specialization">Specialization:</label>
        <select name="specialization" id="specialization" class="form-control">
            <option value="">Select Specialization</option>
        </select>
    </div>

    <div class="form-group">
        <label for="doctor">Doctor Name:</label>
        <select name="doctor" id="doctor" class="form-control">
            <option value="">Select Doctor</option>
        </select>
    </div>

    <div class="form-group">
        <label for="fee">Fee:</label>
        <input type="text" name="fee" id="fee" class="form-control" readonly>
    </div>

    <div class="form-group">
        <label for="appointment_date">Appointment Date:</label>
        <input type="date" name="appointment_date" id="appointment_date" class="form-control">
    </div>

    <div class="form-group">
        <label for="appointment_time">Appointment Time:</label>
        <input type="time" name="appointment_time" id="appointment_time" class="form-control">
    </div>

    <div class="form-group">
        <label for="message">Message:</label>
        <textarea name="message" id="message" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create Appointment</button>
</form> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#location').change(function() {
            var location = $(this).val();
            if (location) {
                $.ajax({
                    url: '{{ route("appointments.getHospitals") }}',
                    type: 'GET',
                    data: { location: location },
                    dataType: 'json',
                    success: function(data) {
                        $('#hospital').empty();
                        $('#specialization').empty();
                        $('#doctor').empty();
                        $('#fee').val('');

                        if (data.length > 0) {
                            $.each(data, function(index, hospital) {
                                $('#hospital').append('<option value="' + hospital + '">' + hospital + '</option>');
                            });
                        } else {
                            $('#hospital').append('<option value="">No hospitals found</option>');
                        }
                    }
                });
            } else {
                $('#hospital').empty();
                $('#specialization').empty();
                $('#doctor').empty();
                $('#fee').val('');
            }
        });

        $('#hospital').change(function() {
            var hospital = $(this).val();
            if (hospital) {
                $.ajax({
                    url: '{{ route("appointments.getSpecializations") }}',
                    type: 'GET',
                    data: { hospital: hospital },
                    dataType: 'json',
                    success: function(data) {
                        $('#specialization').empty();
                        $('#doctor').empty();
                        $('#fee').val('');

                        if (data.length > 0) {
                            $.each(data, function(index, specialization) {
                                $('#specialization').append('<option value="' + specialization + '">' + specialization + '</option>');
                            });
                        } else {
                            $('#specialization').append('<option value="">No specializations found</option>');
                        }
                    }
                });
            } else {
                $('#specialization').empty();
                $('#doctor').empty();
                $('#fee').val('');
            }
        });

        $('#specialization').change(function() {
            var specialization = $(this).val();
            if (specialization) {
                $.ajax({
                    url: '{{ route("appointments.getDoctors") }}',
                    type: 'GET',
                    data: { specialization: specialization },
                    dataType: 'json',
                    success: function(data) {
                        $('#doctor').empty();
                        $('#fee').val('');

                        if (data.length > 0) {
                            $.each(data, function(index, doctor) {
                                $('#doctor').append('<option value="' + doctor + '">' + doctor + '</option>');
                            });
                        } else {
                            $('#doctor').append('<option value="">No doctors found</option>');
                        }
                    }
                });
            } else {
                $('#doctor').empty();
                $('#fee').val('');
            }
        });

        $('#doctor').change(function() {
            var doctor = $(this).val();
            if (doctor) {
                $.ajax({
                    url: '{{ route("appointments.getFee") }}',
                    type: 'GET',
                    data: { doctor: doctor },
                    dataType: 'json',
                    success: function(data) {
                        $('#fee').val(data);
                    }
                });
            } else {
                $('#fee').val('');
            }
        });
    });
</script>

    </div>
</x-app-layout>

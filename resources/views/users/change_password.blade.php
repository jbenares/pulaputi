<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please change your password before continuing. Password must be at least 8 characters.') }}
    </div>
    <x-auth-session-status class="mb-4 text-red-700" :status="session('status')" />
    <form method="POST" action="{{ route('change_password_process') }}">
        @csrf
      
        
      
        <div>
            <x-input-label for="password" :value="__('New Password')" />

            <x-text-input class="block mt-1 w-full"
                            type="password"
                            name="password"
                            id="password"
                            oninput="checkpw()"
                            required />
               
        </div>
        <div>
            <x-input-label for="confirm password" :value="__('Confirm New Password')" />

            <x-text-input class="block mt-1 w-full"
                            type="password"
                            name="confirm_password"
                            id="confirm_password"
                            oninput="checkpw()"
                            required  />
                            <span id='message' class="text-red-700 text-sm"></span>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <div class="flex justify-end mt-4">
            <x-primary-button id='confirm_button'>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
  function checkpw(){
    var pw = document.getElementById("password").value;
    var cpw = document.getElementById("confirm_password").value;

    if(pw != cpw){
        document.getElementById("confirm_button").disabled = true; 
        document.getElementById("confirm_button").style.backgroundColor = '#abb2b9'; 
        document.getElementById("message").innerHTML = 'Warning:Passwords do not match!';
    } else {
        document.getElementById("confirm_button").disabled = false; 
        document.getElementById("confirm_button").style.backgroundColor = '#000'; 
        document.getElementById("message").innerHTML = '';
    }
  }
</script>
<x-guest-layout>
@if(session('status'))
        
    <span class="mb-4 text-sm text-green-500  ">
        {{ session('status') }}
    </span>
      <br><br>
 @endif
                  
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your mobile number and we will text you your new password.') }}
    </div>

    <!-- Session Status -->
  

    <form method="POST" action="{{ route('forgot_password') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="mobile" :value="__('Mobile Number')" />
            <x-text-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required  onkeypress="return onlyNumberKey(event)" autofocus />
            <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Send New Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
<script>
    function onlyNumberKey(evt) {             
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
</script>
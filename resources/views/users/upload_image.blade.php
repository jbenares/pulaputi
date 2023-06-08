<x-guest-layout>
    <div class="mb-4 text-sm text-blue-600 text-center text-lg ">
        {{ __('Upload your picture. Smile for your profile!') }}
    </div>
    <x-auth-session-status class="mb-4 text-red-700" :status="session('status')" />
    <form method="POST" action="{{ route('upload_image_process') }}" enctype="multipart/form-data">
        @csrf
      
        <div>
            <x-input-label for="upload_image" :value="__('Upload Image')" />

            <x-text-input class="block mt-1 w-full"
                            type="file"
                            name="user_image"
                            id="user_image"
                            required />
               
        </div>
        <x-input-error :messages="$errors->get('user_image')" class="mt-2" />
      
       
        <div class="flex justify-end mt-4">
            @if($usertype=='Phakbet')
            <a href="{{ route('dashboard_phakbet') }}" style='padding-right:20px;  text-decoration: underline;' >Skip</a>
            @elseif($usertype == 'Coridor')
            <a href="{{ route('admin_dashboard') }}" style='padding-right:20px;  text-decoration: underline;' >Skip</a>
            @endif
            <x-primary-button id='confirm_button'>
                {{ __('Upload Image') }}
            </x-primary-button>
        </div>
      
    </form>
</x-guest-layout>

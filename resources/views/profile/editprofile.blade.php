<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />
   
        <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
             
               
            <div class="max-w-2xl overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                   Update Profile Information
                </h3>
                <p class="max-w-2xl flex mt-1 text-sm text-gray-500">
                    Update your profile details and information.
                </p>
                @if (session('status'))
               <br>
               <div class="flex flex-wrap items-center gap-4">
                   <span class="px-4 py-2  text-base rounded-full text-green-600  bg-green-200 ">
                       {{ session('status') }}
                   </span>
               </div>
            
           @endif
            </div>
        
            <form method="POST" action="{{ route('update_profile') }}" enctype="multipart/form-data">
                @csrf
            <div class="border-t border-gray-200">
                <dl>
                @foreach($userdetails AS $det)
                  <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Profile Picture
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if(!empty($det->user_image))
                        <img src="{{ URL::asset('images/users/'. $det->user_image) }}" style='height:70px'><br>
                        @endif
                        <input name="user_image" type="file" id="user_image" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        <x-input-error :messages="$errors->get('user_image')" class="mt-2" />
                        </dd>
                     
                    </div>
                  
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Gcash
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input name="gcash" type="text" id="gcash" value="{{old('gcash', $det->gcash)}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        <x-input-error :messages="$errors->get('gcash')" class="mt-2" />
                        </dd>
                    </div>
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Maya
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input name="maya" type="text" id="maya" value="{{old('maya', $det->maya)}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        <x-input-error :messages="$errors->get('maya')" class="mt-2" />
                        </dd>
                    </div>
                   
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                       
                      
                          
                        <button type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Save Changes
                        </button>
                      

                    </div>
                  @endforeach
                </dl>
            </div>
            </form>
            </div>

            
        </div>
        
    </main>
</x-app-layout>

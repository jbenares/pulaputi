<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />
   
        <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
             
               
            <div class="max-w-2xl overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                   Update Password
                </h3>
                <p class="max-w-2xl flex mt-1 text-sm text-gray-500">
                    Update your password regularly. Password must be at least 8 characters.
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
        
            <form method="POST" action="{{ route('changemypassword_process') }}" >
                @csrf
            <div class="border-t border-gray-200">
                <dl>
              
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                           Current Password
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input name="old_password" type="password" id="old_password" required class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        <x-input-error :messages="$errors->get('old_password')" class="mt-2" />
                        </dd>
                    </div>
                    
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                           New Password
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input name="new_password" type="password" id="new_password" required oninput="checkpw()" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
                        </dd>
                    </div>
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Confirm Password
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <input name="confirm_password" type="password" id="confirm_password" required oninput="checkpw()" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        <span id='message' class="text-red-700 text-sm"></span>
                        </dd>
                        
                    </div>
                   
                    <div class="px-4 py-5 bg-gray-50 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                          
                        <button type="submit" id='confirm_button' class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Save Changes
                        </button>
                      

                    </div>
                  
                </dl>
            </div>
            </form>
            </div>

            
        </div>
        
    </main>
</x-app-layout>

<script>
  function checkpw(){
    var pw = document.getElementById("new_password").value;
    var cpw = document.getElementById("confirm_password").value;

    if(pw != cpw){
        document.getElementById("confirm_button").disabled = true; 
        document.getElementById("confirm_button").style.backgroundColor = '#abb2b9'; 
        document.getElementById("message").innerHTML = 'Warning:Passwords do not match!';
    } else {
        document.getElementById("confirm_button").disabled = false; 
        document.getElementById("confirm_button").style.backgroundColor = 'blue'; 
        document.getElementById("message").innerHTML = '';
    }
  }
</script>
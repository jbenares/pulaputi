<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />

    <!-- <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 ">
    <ul class="flex flex-wrap -mb-px">
        <li class="mr-2">
            <a href="{{ route('registermayor.create') }}" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active " aria-current="page">
                Register Mayor/Coridor
            </a>
        </li>
    
        <li class="mr-2">
            <a href="{{ route('createphakbet') }}" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 ">
            Register Phakbet
            </a>
        </li>
    </ul>
    </div> -->

    <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
               
                    <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                        @if($usertype=='King')
                            Create a New Mayor/Coridor Account
                        @elseif($usertype=='Mayor')
                            Create a New Coridor Account
                        @endif
                    </h1>
                
                 
                <!-- <h2 class="text-gray-400 text-md">
                    Here&#x27;s what&#x27;s happening with your ambassador account today.
                </h2> -->
                <br>
                <div class="flex items-center space-x-4">
              
                    <a href="{{ route('registermayor.index') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        @if($usertype=='King')
                            Mayor/Coridor List
                        @elseif($usertype=='Mayor') 
                            Coridor List
                        @endif
                        
                    </a>
                  
             
                    <a href="{{ route('phakbetlist') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Phakbet List
                    </a>
                    <a href="{{ route('createphakbet') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Register Phakbet
                    </a>
                </div>

    <div class="container max-w-3xl px-4 mx-auto sm:px-8">
  
   
   
    <div class="p-6 mt-8">
        <form action="{{ route('store_mayor') }}" method="POST">
        @if($usertype=='King')
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <select name="usertype" required class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" name="pseudo" placeholder="Pseudo"/>
                        <option value="">User Type</option>
                        <option value="Mayor">Mayor</option>
                        <option value="Phakbet">Phakbet</option>
                    </select>
                    </div>
                </div>
        @endif
                <div class="flex flex-col mb-2">
                  
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="name" name="Full Name" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Full Name"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input name="mobile" type="text" id="mobile" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Mobile"/>
                        </div>
                        <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                    </div>
                   
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="email" id="email" name="email" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Email"/>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="gcash" name="gcash" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Gcash"/>
                        </div>

                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="maya" name="maya" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Maya"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="location" name="location" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Location"/>
                        </div>
                    </div>
                    
                      
                            <div class="flex w-full my-4">
                                <button type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                Register
                                </button>
                            </div>
                        </form>

            </div>
</div>
    </main>
</x-app-layout>
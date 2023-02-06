<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />

    <!-- <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 ">
    <ul class="flex flex-wrap -mb-px">
        <li class="mr-2">
            <a href="{{ route('registermayor.create') }}" class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 ">
                Register Mayor/Coridor
            </a>
        </li>
    
        <li class="mr-2">
            <a href="{{ route('createphakbet') }}" class="inline-block p-4 border-b-2 border-blue-600   text-blue-600 rounded-t-lg active " aria-current="page" >
            Register Phakbet
            </a>
        </li>
    </ul>
    </div> -->

    <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                    Create a New Phakbet Account
                </h1>
                <!-- <h2 class="text-gray-400 text-md">
                    Here&#x27;s what&#x27;s happening with your ambassador account today.
                </h2> -->
                <br>
                <div class="flex items-center space-x-4">
                @if($usertype=='King')
                    <a href="{{ route('registermayor.index') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                    Mayor/Coridor List    
                    </a>
                           
                @elseif($usertype=='Mayor') 
                <a href="{{ route('registermayor.index') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                Coridor List 
                </a>
                @endif
                   
                   
                    @if($usertype=='King')
                        <a href="{{ route('registermayor.create') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                            Register Mayor/Coridor
                        </a>
                    @elseif($usertype=='Mayor') 
                        <a href="{{ route('registermayor.create') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                            Register Coridor
                        </a>
                    @elseif($usertype=='King' || $usertype=='Mayor' || $usertype=='Coridor') 
                        <a href="{{ route('phakbetlist') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Phakbet List
                    </a>
                    @endif
                  
                   
                   
                </div>

    <div class="container max-w-3xl px-4 mx-auto sm:px-8">
 
   
    <div class="p-6 mt-8">
        <form action="#">
           
            
                
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="fullname" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Full Name"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="mobile" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Mobile"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="email" id="email" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Email"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="gcash" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Gcash"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="maya" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Maya"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="location" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Location"/>
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
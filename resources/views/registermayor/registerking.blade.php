<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />



    <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                    Create a New King Account
                </h1>
                <br>
                <div class="flex items-center space-x-4">
                <a href="{{ route('kinglist') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                    King List 
                    </a>
                </div>
               
    <div class="container max-w-3xl px-4 mx-auto sm:px-8">
   
    <div class="p-6 mt-8">
    @if (session('status'))
      
            <div class="flex flex-wrap items-center gap-4">
                <span class="px-4 py-2  text-base rounded-full text-green-600  bg-green-200 ">
                    {{ session('status') }}
                </span>
            </div>
            <br>
        @endif
        <form action="{{ route('store_king') }}" method="POST">
      
        @csrf
          
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="name" name="name" value="{{old('name')}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Full Name"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="mobile" name="mobile" value="{{old('mobile')}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Mobile"/>
                        </div>
                        <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="email" id="email" name="email" value="{{old('email')}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Email"/>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="gcash" name="gcash" value="{{old('gcash')}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Gcash (optional)"/>
                        </div>
                        <x-input-error :messages="$errors->get('gcash')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="maya" name="maya" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Maya (optional)"/>
                        </div>
                        <x-input-error :messages="$errors->get('maya')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="wallet" name="wallet" value="{{old('wallet')}}" onkeypress="return onlyNumberKey(event)" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Add Wallet"/>
                        </div>
                        <x-input-error :messages="$errors->get('wallet')" class="mt-2" />
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

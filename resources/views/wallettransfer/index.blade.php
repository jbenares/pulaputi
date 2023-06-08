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
                       Wallet Transfer
                    </h1>
            

    <div class="container max-w-3xl px-4 mx-auto sm:px-8">
  
    <div class="p-6 mt-8">
        @if (session('status'))
                <br>
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="px-4 py-2  text-base rounded-full text-green-600  bg-green-200 ">
                            {{ session('status') }}
                        </span>
                    </div>
                @endif
                <br>

            <div class="flex items-center">
            <button type="button" class="flex items-center w-full px-4 py-2 text-base font-medium text-black bg-blue-200 border-t border-b border-l rounded-l-md hover:bg-blue-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 1792 1792">
                    <path d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                    </path>
                </svg>
                Current Wallet
            </button>
            <button type="button" class="w-full px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                P {{ number_format(getUserDetails($userid, 'curr_wallet'),2) }}
            </button>
          
        </div><br>
        <form action="{{ route('transferwallet') }}" method="POST"  onsubmit="return checkRefCode_submit()" >
        @csrf
       
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="ref_code" name="ref_code" value="{{old('ref_code')}}"  oninput = "checkRefCode(this.value, {{ $userid }})" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Recipient Ref Code Or Mobile Number"/>
                        </div>
                       <span id='refcode_message' class='text-xs'></span>
                       @if(session('err_message'))
                            <div class="flex flex-wrap items-center gap-4">
                                <span class="px-4 py-2  text-base  text-red-600 ">
                                    {{ session('err_message') }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input name="amount" type="text" id="amount" value="{{old('amount')}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Amount to Transfer"/>
                        </div>
                        <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                    </div>
                   
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                    <textarea type="text" id="remarks" name="remarks"  class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Remarks"/>{{old('remarks')}}</textarea>
                        <x-input-error :messages="$errors->get('remarks')" class="mt-2" />
                    </div>
                   
                    <div class="flex w-full my-4">
                        <button type="submit" id='transfernow' class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Transfer Now
                        </button>
                    </div>
                </form>

            </div>
</div>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</x-app-layout>
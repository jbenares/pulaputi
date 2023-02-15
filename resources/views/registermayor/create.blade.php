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
  
    @if (session('status'))
                <br>
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="px-4 py-2  text-base rounded-full text-green-600  bg-green-200 ">
                            {{ session('status') }}
                        </span>
                    </div>
                @endif
   
    <div class="p-6 mt-8">
        <form action="{{ route('store_mayor') }}" method="POST">
        @csrf
        @if($usertype=='King')
            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <select name="usertype" required id="usertype"  class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        <option value="">User Type</option>
                        <option value="Mayor">Mayor</option>
                        <option value="Coridor">Coridor</option>
                    </select>
                    </div>
                </div>
        @endif

            <div id="mayorDD" class="flex flex-col mb-2" style="display:none">
                <select name="mayor" id="mayor"  class='form-control rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent'></select>
            </div>
               
                  
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="name" name="name" value="{{old('name')}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Full Name"/>
                        </div>
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input name="mobile" type="text" id="mobile" value="{{old('mobile')}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Mobile"/>
                        </div>
                        <x-input-error :messages="$errors->get('mobile')" class="mt-2" />
                    </div>
                   
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="email" id="email" name="email" value="{{old('email')}}"  class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Email"/>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="gcash" name="gcash" value="{{old('gcash')}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Gcash"/>
                        </div>
                        <x-input-error :messages="$errors->get('gcash')" class="mt-2" />
                    </div>
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="maya" name="maya" value="{{old('maya')}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Maya"/>
                        </div>
                        <x-input-error :messages="$errors->get('maya')" class="mt-2" />
                    </div>
                 
                    <div class="flex w-full my-4">
                        <button type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Register
                        </button>
                    </div>
                </form>

            </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('input').attr('autocomplete','off');

            $('#usertype').on('change', function() {
                var x = document.getElementById("mayorDD");
               var usertype = $(this).val();
                if(usertype == 'Coridor'){
                    
                     x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
               if(usertype) {
                   $.ajax({
                       url: '/getMayor/'+usertype,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $('#mayor').empty();
                            $('#mayor').append('<option hidden>Choose Mayor</option>'); 
                            $.each(data, function(key, mayor){
                                $('select[name="mayor"]' ).append('<option value="'+ mayor.id +'">' + mayor.name+ '</option>');
                            });
                        }else{
                            $('#mayor').empty();
                        }
                     }
                   });
               }else{
                 $('#mayor').empty();
               }
            });
            });
        </script>

    </main>
</x-app-layout>
<x-app-layout>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://cdn.tiny.cloud/1/6sc52bbq35j9wax8aqztkfgeuza7n5nzzxxjiyss5fmrherg/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#event_desc',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
     
    });
  </script>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />

     <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                   Create an Event
                </h1>
                <!-- <h2 class="text-gray-400 text-md">
                    Here&#x27;s what&#x27;s happening with your ambassador account today.
                </h2> -->
                <br>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('events.index') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        On-going Event
                    </a>
                    <a href="{{ route('finishedevents') }}" class="flex items-center px-4 py-2 text-red-600 border border-red-600 rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Finished Events
                    </a>
                 
                   
                </div>


    <div class="container max-w-3xl px-4 mx-auto sm:px-8">
  
    <div class="p-6 mt-8">
        <div class="flex items-center">
            <button type="button" class="flex items-center w-full px-4 py-2 text-base font-medium text-black bg-blue-200 border-t border-b border-l rounded-l-md hover:bg-blue-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 1792 1792">
                    <path d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                    </path>
                </svg>
                Current Wallet
            </button>
            <button type="button" class="w-full px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                P{{ number_format($curr_wallet,2)}}
            </button>
            <button type="button" class="flex items-center w-full px-4 py-2 text-base font-medium text-black bg-green-200 border-t border-b border-l rounded-l-md hover:bg-green-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 1792 1792">
                    <path d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                    </path>
                </svg>
                Pot Money
            </button>
            <button type="button" class="w-full px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                P {{ number_format(getPotMoney($userid,2))}}
            </button>
        </div><br>

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Are you sure you want to create this event?');">
            @csrf
            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                       
                        <input type="text" id="event_name" name="event_name" value="{{old('event_name')}}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Event Name"/>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('event_name')" class="mt-2" />

                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <select type="text" id="game_category" name="game_category" onchange="resetDD()" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                            <option value="">Game Category</option>
                            @foreach($game_category AS $gc)
                                <option value="{{ $gc->id.'_'.$gc->no_of_outcomes.'_'.$gc->choice_array.'_'.$gc->option_type }}">{{ $gc->category_name }}</option>
                            @endforeach
                        </select>    
                    </div>
                    </div>
                    <x-input-error :messages="$errors->get('game_category')" class="mt-2"  />
                <div id="rangeRaffle" class="flex flex-col mb-2" style="display:none">
                <div class="flex flex-col mb-2">
                            <div class=" relative ">
                        <input type="number" id="raffle_from" name="raffle_from" value="" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Range From"/>
                        </div>
                        </div>
                   
                        <div class="flex flex-col mb-2">
                            <div class=" relative ">
                        <input type="number" id="raffle_to" name="raffle_to" value="" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Range To"/>
                        </div>
                        </div>
                    
                </div> 
            
                <div id="questionTypeDD" class="flex flex-col mb-2" style="display:none">
                <select name="questionType" id="questionType" onchange="check_gamecat(this.value)" class='form-control rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent'></select>
            </div>
                    <div id="outcomelist" class="alt1" >
                     
                    </div>
                    <div id="outcomeDD" class="alt1" style="padding:10px; display:none">
                        <div class="flex flex-col mb-2">
                            <div class=" relative ">
                                <select name="choice_array_1" id="choice_array_1" onchange="checkdudplicates(this.value, '1')"  class='form-control rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-2 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent'></select>
                                <span id="question_error_1" class="text-red-700 text-sm"></span>
                                <span id="description_1" class="text-blue-700 text-sm"></span>
                            </div>
                        </div>
                        
                        <div class="flex flex-col mb-2">
                            <div class=" relative ">
                            <select name="choice_array_2" id="choice_array_2"   onchange="checkdudplicates(this.value, '2')"  class='form-control rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent'></select>
                            <span id="question_error_2" class="text-red-700 text-sm"></span>
                            <span id="description_2" class="text-blue-700 text-sm"></span>    
                        </div>
                        </div>    
                        <div class="flex flex-col mb-2">
                            <div class=" relative ">
                            <select name="choice_array_3" id="choice_array_3"  onchange="checkdudplicates(this.value, '3')"  class='form-control rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent'></select>
                            <span id="question_error_3" class="text-red-700 text-sm"></span> 
                            <span id="description_3" class="text-blue-700 text-sm"></span>   
                        </div>
                        </div>
                    </div>

                    <div id="outcomeDD2" class="alt1" style="padding:10px; display:none">
                        <div class="flex flex-col mb-2">
                            <div class=" relative ">
                                <select name="choice_array_1_xx" id="choice_array_1_xx" onchange="checkdudplicates(this.value, '1')"  class='form-control rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-2 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent'></select>
                                <span id="question_error_1" class="text-red-700 text-sm"></span>
                                <span id="description_1" class="text-blue-700 text-sm"></span>
                            </div>
                        </div>
                        
                        <div class="flex flex-col mb-2">
                            <div class=" relative ">
                            <select name="choice_array_2_xx" id="choice_array_2_xx"   onchange="checkdudplicates(this.value, '2')"  class='form-control rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent'></select>
                            <span id="question_error_2" class="text-red-700 text-sm"></span>
                            <span id="description_2" class="text-blue-700 text-sm"></span>    
                        </div>
                        </div>    
                     
                    </div>
        

            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <textarea type="text" id="event_desc" name="event_desc"  class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Event Description"/>{{old('event_desc')}}</textarea>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('event_desc')" class="mt-2" />
              
            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="file" id="event_image" name="event_image" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('event_image')" class="mt-2" />

            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="start_date"  name="start_date"  value="{{old('start_date')}}" placeholder="Start Date" onfocus="(this.type='datetime-local')" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />

             <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="end_date" name="end_date" value="{{old('end_date')}}" placeholder="End Date" onfocus="(this.type='datetime-local')"  class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
            
            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="initial_pot" name="initial_pot" value="{{old('initial_pot')}}" placeholder="Initial Pot" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('initial_pot')" class="mt-2" />
            
            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="slot_price" name="slot_price" value="{{old('slot_price')}}" placeholder="Slot Price (maximum 10)" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('slot_price')" class="mt-2" />

         
                    <div class="flex w-full my-4">
                        <button type="submit" id='createevent' class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        Save Event
                        </button>
                    </div>
                        </form>

            </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                
                $('#game_category').on('change', function() {
                var x = document.getElementById("questionTypeDD");
                var raf = document.getElementById("rangeRaffle");
             
                var gc = $(this).val();
                var gamecat = gc.split("_");

                    var choices = gamecat[2];
                    var optiontype = gamecat[3];
                  
                    if(choices=="" && optiontype==1){
                        x.style.display = "block";
                        raf.style.display = "none";
                        $('#questionType').empty();
                        $('#questionType').append('<option value="0">Choose Question Type</option>'); 
                        $('select[name="questionType"][id="questionType"]' ).append('<option value="0">Pre-existing Questions</option>');
                        $('select[name="questionType"][id="questionType"]' ).append('<option value="1">Custom Questions</option>');
                    } else if(choices!="") {
                        x.style.display = "none";
                    } else if(choices=="" && optiontype==2) {
                        raf.style.display = "block";
                        x.style.display = "none";
                    }
                
                
                });
            });


        </script>
        
    </main>
</x-app-layout>
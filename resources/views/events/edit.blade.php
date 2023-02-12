<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />

     <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                    @if($done==0)
                   Update an Event
                    @else 
                    View Event
                    @endif
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

    

    <!-- <div class="h-screen px-4 pb-24 overflow-auto md:px-6">   
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 ">
    <ul class="flex flex-wrap -mb-px">
      
    
        <li class="mr-2">
            <a href="" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 ">
            Ongoing
            </a>
        </li>
        <li class="mr-2">
            <a href="" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 ">
            Finished
            </a>
        </li>

        <li class="mr-2">
            <a href="{{ route('events.create') }}" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active " aria-current="page">
                Create
            </a>
        </li>
    </ul>
    </div> -->

    <div class="container max-w-3xl px-4 mx-auto sm:px-8">
  
    <div class="p-6 mt-8">
        <form action="{{ route('events.update', $event->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                       
                        <input type="text" id="event_name" name="event_name" value="{{ $event->event_name }}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Event Name"/>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('event_name')" class="mt-2" />

            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <textarea type="text" id="event_desc" name="event_desc"  class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Event Description"/>{{ $event->event_description }}</textarea>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('event_desc')" class="mt-2" />

            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                    @if($done==0)
                        <input type="file" id="event_image" name="event_image" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                    @endif    
                        <img src="{{ URL::asset('images/'. $event->event_image) }}" width="300px"> <br>
                        @if($done==0)
                        <input type='checkbox' name='remove_photo' value='1'><span style='color:red; font-size:12px'> Remove Photo</span>
                        @endif   
                    </div>
                    </div>
                    
                    <x-input-error :messages="$errors->get('event_image')" class="mt-2" />
                   

            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="start_date"  name="start_date"  value="{{ $event->date_start }}" placeholder="Start Date" onfocus="(this.type='datetime-local')" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />

             <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="end_date" name="end_date"  value="{{ $event->date_end }}"  placeholder="End Date" onfocus="(this.type='datetime-local')" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
            
            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="initial_pot" name="initial_pot" value="{{$event->initial_pot}}" placeholder="Initial Pot" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('initial_pot')" class="mt-2" />
            
            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="slot_price" name="slot_price" value="{{$event->slot_price}}" placeholder="Slot Price" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('slot_price')" class="mt-2" />

            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                    @if($done==0)
                        <select type="text" id="game_category" name="game_category" onchange="check_gamecat(this.value)" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                            <option value="">Game Category</option>
                            @foreach($game_category AS $gc)
                                <option value="{{ $gc->id.'_'.$gc->no_of_outcomes.'_'.$gc->choice_array }}" {{ $gc->id == $event->game_category_id ? 'selected' : '' }}>{{ $gc->category_name }}</option>
                            @endforeach
                        </select>   
                    @else
                        <input type='text' value="{{getGameCatDetails($event->game_category_id, 'category_name') }}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" >
                    @endif 
                    </div>
                    </div>
                    <x-input-error :messages="$errors->get('game_category')" class="mt-2" />
                 
                  
                    @php $outcome = getOutcome($event->game_category_id);   @endphp
                    
                    @if(!empty($event->choice_array))
                       @php $choices = explode(", ", $event->choice_array); 
                        @endphp

                       @for($y=0;$y<$outcome;$y++)
                       @php $field = "choice_array_". $y; @endphp
                       <input type="hidden" name="{{ $field }}" id = "{{ $field }}" value="{{ $choices[$y] }}" />
                       @endfor
                        
                    @endif

                    @if(!empty($event->choice_array))
                       @php $choices = explode(", ", $event->choice_array); @endphp

                       @for($x=0;$x<$outcome;$x++)
                       @php $field = "choice_array_". $x; @endphp
                            <div class="flex flex-col mb-2 added">
                                <div class=" relative ">
                                <input type="text" id="{{ $field }}" name="{{ $field }}" value="{{ $choices[$x] }}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                            </div>
                            </div>
                       
                        @endfor
                        
                    @endif
                    <div id="outcomelist" class="alt1" style="padding:10px;">
                        
                    </div>
                    <input type="hidden" id="game_category_id" value="{{ $event->game_category_id }}">

                        @if($done == 0)
                            <div class="flex w-full my-4">
                                <button type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                Save Event
                                </button>
                            </div>
                        @endif
                        </form>

            </div>
</div>
    </main>
</x-app-layout>
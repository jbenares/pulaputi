<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />
<div class="h-screen px-4 pb-24 overflow-auto md:px-6">
    <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                    Finished Events
                </h1>
                <!-- <h2 class="text-gray-400 text-md">
                    Here&#x27;s what&#x27;s happening with your ambassador account today.
                </h2> -->
                <br>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('events.create') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Create an Event
                    </a>
                    <a href="{{ route('events.index') }}" class="flex items-center px-4 py-2 text-red-600 border border-red-600 rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        On-Going Events
                     </a>
                  
                </div>
                @if (session('status'))
                <br>
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="px-4 py-2  text-base rounded-full text-green-600  bg-green-200 ">
                            {{ session('status') }}
                        </span>
                    </div>
                @endif
              
                <div class="grid grid-cols-1 gap-4 my-4 md:grid-cols-2 lg:grid-cols-3">
                    @php $count=1; @endphp
                @foreach($events AS $ev)
                    @if($ev->win_flag == 0)
                     @php $bg = 'bg-white';  @endphp
                    @else 
                     @php  $bg = 'bg-green-100';  @endphp
                    @endif
                    <div class="w-full" >
                        <div class="relative w-full px-4 py-6 {{ $bg }} shadow-lg dark:bg-gray-700">
                            <p class="text-md font-semibold text-gray-700 border-b border-gray-300 w-max dark:text-white">
                                {{ $ev->event_name }}
                            </p>
                            <div class="flex items-end my-6 space-x-2 " style="display:flex; justify-content:center;">
                                <!-- <p class="text-5xl font-bold text-black dark:text-white">
                                    12
                                </p> -->
                                  <img src="{{ URL::asset('images/game_category/'. $ev->event_image) }}" style='height:200px'>

                             
                            </div>
                            <div class="dark:text-white">
                                <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-300 sm:space-x-12">
                                    <p>
                                        Current Pot
                                    </p>
                                    <div class="flex items-end text-xs">
                                        {{ number_format($ev->running_balance,2) }}
                                    
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-300 md:space-x-24">
                                    <p>
                                        Profit
                                    </p>
                                    <div class="flex items-end text-xs">
                                        {{ number_format(getProfit($ev->id),2) }} 
                                      
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-300 md:space-x-24">
                                    <p>
                                    Slots Taken
                                    </p>
                                    <div class="flex items-end text-xs">
                                    {{ getTotalSlots($ev->id) }}
                                       
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-300 md:space-x-24">
                                    <p>
                                    No. of Winners
                                    </p>
                                    <div class="flex items-end text-xs">
                                    {{ $ev->no_of_winners }}
                                       
                                    </div>
                                </div>
                                
                                
                            </div>
                            <br>
                            <div style='text-align:center'>
                            <a href="{{ route('events.edit', $ev->id) }}" type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                View Event
                            </a> &nbsp;

                            @if($ev->win_flag == 0)
                                <a href="#" data-modal-target="authentication-modal-{{ $count }}" data-modal-toggle="authentication-modal-{{ $count }}" type="button" class="py-2 px-4  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    Finalize
                                </a>
                            @endif
                            </div>
                        </div>
                        
                    </div>


                    <div id="authentication-modal-{{ $count }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                      
                                            
                        <div class="relative w-full h-full max-w-md md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal-{{ $count }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                    <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">{{ $ev->event_name }}</h3>
                                    
                                    <div class="flex items-center">
                                        <button type="button" class="py-2 px-4 flex justify-center items-center  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                            
                                            Current Pot
                                        </button>
                                        <button type="button" class="w-full px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                                            <strong>P  {{ number_format($ev->running_balance,2) }}</strong>
                                        </button>
                                    </div><br>
                                    <p>
                                    <span class="text-sm text-blue-700 hover:underline dark:text-blue-500">{{ date('M j, Y H:i',strtotime($ev->date_start)) }} to  {{  date('M j, Y H:i',strtotime($ev->date_end)) }}
                                       
                                    <br>Slot Price: {{ number_format($ev->slot_price,2) }}</span>    
                                    <br><br>{{ $ev->event_description }} 
                                    </p>
                                    <form class="space-y-6" action="{{ route('set_winning_array', ['count'=>$count]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(!empty($ev->choice_array))
                                        @php $choices = explode(", " , getChoiceArray($ev->id)); 
                                            $count_choices = count($choices);    
                                       
                                         $a=1; @endphp
                                        @for($x=0;$x<$count_choices;$x++)
                                             <input type="text" name="choice_{{ $count }}_{{ $a }}" id="choice_{{ $count }}_{{ $a }}" required placeholder="{{ $choices[$x] }} " class=" rounded-lg flex-1 appearance-none border border-gray-300 py-2 px-4 bg-gray-50  text-gray-900 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent w-full" >
                                         @php $a++; @endphp
                                        @endfor
                                        
                                        <input type="hidden" name="choice_count_{{ $count }}" id="choice_count_{{ $count }}" value="{{ $count_choices }}">
                                    @else
                                    @php $choices = explode("-" , getChoiceArray($ev->id));
                                            $min = $choices[0];
                                            $max = $choices[1];
                                            $outcomes = getGameCatDetails($ev->game_category_id, 'no_of_outcomes'); 
                                    @endphp
                                            @for($y=1;$y<=$outcomes;$y++)
                                                <input type="text" id="choice_{{ $count }}_{{ $y }}" name="choice_{{ $count }}_{{ $y }}"  placeholder="{{ getChoiceArray($ev->id) }}" required class=" rounded-lg flex-1 appearance-none border border-gray-300 py-2 px-4 bg-gray-50  text-gray-900 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent w-full" />
                                               
                                            @endfor
                                            <input type="hidden" name="choice_count_{{ $count }}" id="choice_count_{{ $count }}" value="{{ $outcomes }}">
                                    @endif

                                    <input type="file" id="result_image_{{ $count }}" name="result_image_{{ $count }}" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                                    <input type="text" name="url_results_{{ $count }}" id="url_results_{{ $count }}"  placeholder="URL Results" class=" rounded-lg flex-1 appearance-none border border-gray-300 py-2 px-4 bg-gray-50  text-gray-900 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent w-full" >

                                    <button type="submit" id="button_{{ $count }}" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Set Winning Array</button>
                                        <input type="hidden" name="event_{{ $count }}" id="event_{{ $count }}" value="{{ $ev->id }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 


                    @php $count++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    </main>
</x-app-layout>
<script>
    $(document).ready(function() {
        $('input').attr('autocomplete','off');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />
<div class="h-screen px-4 pb-24 overflow-auto md:px-6">
    <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                    On-Going Events
                </h1>
                <!-- <h2 class="text-gray-400 text-md">
                    Here&#x27;s what&#x27;s happening with your ambassador account today.
                </h2> -->
                <br>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('events.create') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Create an Event
                    </a>
                    <a href="{{ route('finishedevents') }}" class="flex items-center px-4 py-2 text-red-600 border border-red-600 rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Finished Events
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
           
                @if(empty($events))
                <br><br>
                <p class="text-center text-xl text-red-700">You have no current events as of the moment. Create an new event now to earn more! </p>
                @else 
                <div class="grid grid-cols-1 gap-4 my-4 md:grid-cols-2 lg:grid-cols-3">
               
                   
              
                    @php $count=1; @endphp
                    @foreach($events AS $ev)
                        <div class="w-full"  id="event_block_{{ $count }}">
                            <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                                <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-full dark:text-white">
                                    {{ $ev->event_name }}
                                </p>
                                <div class="flex items-end my-6 space-x-2 " style="display:flex; justify-content:center;">
                                    <!-- <p class="text-5xl font-bold text-black dark:text-white">
                                        12
                                    </p> -->
                                    <img src="{{ URL::asset('images/game_category/'. $ev->event_image) }}" style='height:200px'>

                                
                                </div>
                                <div class="dark:text-white">
                                    <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                        <p>
                                            Current Pot
                                        </p>
                                        <div class="flex items-end text-xs">
                                            P{{ number_format($ev->running_balance,2) }}
                                        
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between pb-2 mb-2 space-x-20 text-sm border-b border-gray-300 md:space-x-50">
                                        <p>
                                            Remaining Hours
                                        </p>
                                        <div id="demo_{{ $count }}" class="flex items-end text-xs" >
                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                timer({{ $count }}, {{ $ev->id }})
                                            });
                                        </script>
                                        
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                        <p>
                                            Profit
                                        </p>
                                        <div class="flex items-end text-xs">
                                        P {{ number_format(getProfit($ev->id),2) }} 
                                        
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                                        <p>
                                        Slots Taken
                                        </p>
                                        <div class="flex items-end text-xs">
                                            {{ getTotalSlots($ev->id) }}
                                        
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <br>
                                <input type="hidden" name="date_end_{{ $count }}" id="date_end_{{ $count }}" value="{{ $ev->date_end }}">
                                <div style='text-align:center'>
                                <a href="{{ route('events.edit', $ev->id) }}" type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    Update Event
                                </a>
                                </div>
                            </div>
                            
                        </div>
                        @php $count++; @endphp      
                        @endforeach
                    @endif
                   
                </div>
            </div>
        </div>
    </div>


   
    </main>
</x-app-layout>

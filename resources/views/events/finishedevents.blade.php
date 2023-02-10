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
                @foreach($events AS $ev)
                    <div class="w-full">
                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                                {{ $ev->event_name }}
                            </p>
                            <div class="flex items-end my-6 space-x-2 " style="display:flex; justify-content:center;">
                                <!-- <p class="text-5xl font-bold text-black dark:text-white">
                                    12
                                </p> -->
                                  <img src="{{ URL::asset('images/'. $ev->event_image) }}" style='height:200px'>

                             
                            </div>
                            <div class="dark:text-white">
                                <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                    <p>
                                        Current Pot
                                    </p>
                                    <div class="flex items-end text-xs">
                                        P{{ $ev->running_balance }}
                                    
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                        Remaining Hours
                                    </p>
                                    <div class="flex items-end text-xs">
                                        {{ timeRemaining($ev->date_end); }}
                                      
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                        Profit
                                    </p>
                                    <div class="flex items-end text-xs">
                                        P8,000.00
                                       
                                    </div>
                                </div>
                                <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                                    <p>
                                       Slots Taken
                                    </p>
                                    <div class="flex items-end text-xs">
                                        {{ $ev->slots_taken }}
                                      
                                    </div>
                                </div>
                                
                                
                            </div>
                            <br>
                            <div style='text-align:center'>
                            <a href="{{ route('events.edit', $ev->id) }}" type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                Update Event
                            </a>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


   
    </main>
</x-app-layout>

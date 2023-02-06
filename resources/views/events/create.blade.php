<x-app-layout>
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
        <form action="#">
            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                       
                        <input type="text" id="event_name" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Event Name"/>
                        </div>
                    </div>

            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <textarea type="text" id="event_desc" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Event Description"/></textarea>
                        </div>
                    </div>

            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="file" id="event_image" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>

            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="start_date"  placeholder="Start Date"  onfocus="(this.type='date')" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>

             <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="end_date"  placeholder="End Date" onfocus="(this.type='date')" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
            
            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="initial_pot"  placeholder="Initial Pot" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>
            
            <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="slot_price"  placeholder="Slot Price" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" />
                        </div>
                    </div>

            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <select  class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" name="win_order" placeholder="Win Order"/>
                        <option value="">Win Order</option>
                        <option value="Any Order">Any Order</option>
                        <option value="Specific Order">Specific Order</option>
                    </select>
                    </div>
                </div>

            <div class="flex flex-col mb-2">
                <div class=" relative ">
                    <select  class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" name="option_type" placeholder="Option Type"/>
                        <option value="">Option Type</option>
                        <option value="Multiple Choice">Multiple Choice</option>
                        <option value="Range of Numbers">Range of Numbers</option>
                    </select>
                    </div>
                </div>

                <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="no_of_outcomes" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="No. of Outcomes"/>
                        </div>
                    </div>
                
                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="choice1" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Choice 1"/>
                        </div>
                    </div>

                    <div class="flex flex-col mb-2">
                    <div class=" relative ">
                        <input type="text" id="choice2" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Choice 2"/>
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
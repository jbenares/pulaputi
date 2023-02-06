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
                        Ongoing Events
                    </a>
                  
                 

                   
                </div>
                <div class="grid grid-cols-1 gap-4 my-4 md:grid-cols-2 lg:grid-cols-3">
                    <div class="w-full">
                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                                Event Name
                            </p>
                            <div class="flex items-end my-6 space-x-2">
                                <!-- <p class="text-5xl font-bold text-black dark:text-white">
                                    12
                                </p> -->
                                <img src='images/lotto.jpg'>
                                <!-- <span class="flex items-center text-xl font-bold text-green-500">
                                    <svg width="20" fill="currentColor" height="20" class="h-3" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    22%
                                </span> -->
                            </div>
                            <div class="dark:text-white">
                                <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                    <p>
                                        Total Pot
                                    </p>
                                    <div class="flex items-end text-xs">
                                        P10,000.00
                                    
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                        Event Date
                                    </p>
                                    <div class="flex items-end text-xs">
                                        January 13, 2023
                                      
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
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                    Slots Taken
                                    </p>
                                    <div class="flex items-end text-xs">
                                       163
                                    </div>
                                </div>
                                <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                                    <p>
                                       Number of Winners
                                    </p>
                                    <div class="flex items-end text-xs">
                                        1
                                    </div>
                                </div>
                                
                            </div>
                            
                            <button type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                View Event
                            </button>
                        </div>
                        
                    </div>
                    <div class="w-full">
                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                                Event Name
                            </p>
                            <div class="flex items-end my-6 space-x-2">
                                <!-- <p class="text-5xl font-bold text-black dark:text-white">
                                    12
                                </p> -->
                                <img src='images/lotto.jpg'>
                                <!-- <span class="flex items-center text-xl font-bold text-green-500">
                                    <svg width="20" fill="currentColor" height="20" class="h-3" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    22%
                                </span> -->
                            </div>
                            <div class="dark:text-white">
                                <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                    <p>
                                        Total Pot
                                    </p>
                                    <div class="flex items-end text-xs">
                                        P10,000.00
                                    
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                        Event Date
                                    </p>
                                    <div class="flex items-end text-xs">
                                        January 13, 2023
                                      
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
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                    Slots Taken
                                    </p>
                                    <div class="flex items-end text-xs">
                                       163
                                    </div>
                                </div>
                                <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                                    <p>
                                       Number of Winners
                                    </p>
                                    <div class="flex items-end text-xs">
                                        1
                                    </div>
                                </div>
                                
                            </div>
                            
                            <button type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                View Event
                            </button>
                        </div>
                        
                    </div>
                    <div class="w-full">
                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                                Event Name
                            </p>
                            <div class="flex items-end my-6 space-x-2">
                                <!-- <p class="text-5xl font-bold text-black dark:text-white">
                                    12
                                </p> -->
                                <img src='images/lotto.jpg'>
                                <!-- <span class="flex items-center text-xl font-bold text-green-500">
                                    <svg width="20" fill="currentColor" height="20" class="h-3" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    22%
                                </span> -->
                            </div>
                            <div class="dark:text-white">
                                <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                    <p>
                                        Total Pot
                                    </p>
                                    <div class="flex items-end text-xs">
                                        P10,000.00
                                    
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                        Event Date
                                    </p>
                                    <div class="flex items-end text-xs">
                                        January 13, 2023
                                      
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
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                    Slots Taken
                                    </p>
                                    <div class="flex items-end text-xs">
                                       163
                                    </div>
                                </div>
                                <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                                    <p>
                                       Number of Winners
                                    </p>
                                    <div class="flex items-end text-xs">
                                        0
                                    </div>
                                </div>
                                
                            </div>
                            
                            <button type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                View Event
                            </button>
                        </div>
                        
                    </div>
                    <div class="w-full">
                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                                Event Name
                            </p>
                            <div class="flex items-end my-6 space-x-2">
                                <!-- <p class="text-5xl font-bold text-black dark:text-white">
                                    12
                                </p> -->
                                <img src='images/lotto.jpg'>
                                <!-- <span class="flex items-center text-xl font-bold text-green-500">
                                    <svg width="20" fill="currentColor" height="20" class="h-3" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    22%
                                </span> -->
                            </div>
                            <div class="dark:text-white">
                                <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                    <p>
                                        Total Pot
                                    </p>
                                    <div class="flex items-end text-xs">
                                        P10,000.00
                                    
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                        Event Date
                                    </p>
                                    <div class="flex items-end text-xs">
                                        January 13, 2023
                                      
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
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                    Slots Taken
                                    </p>
                                    <div class="flex items-end text-xs">
                                       163
                                    </div>
                                </div>
                                <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                                    <p>
                                       Number of Winners
                                    </p>
                                    <div class="flex items-end text-xs">
                                        1
                                    </div>
                                </div>
                                
                            </div>
                            
                            <button type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                View Event
                            </button>
                        </div>
                        
                    </div>
                    <div class="w-full">
                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                                Event Name
                            </p>
                            <div class="flex items-end my-6 space-x-2">
                                <!-- <p class="text-5xl font-bold text-black dark:text-white">
                                    12
                                </p> -->
                                <img src='images/lotto.jpg'>
                                <!-- <span class="flex items-center text-xl font-bold text-green-500">
                                    <svg width="20" fill="currentColor" height="20" class="h-3" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    22%
                                </span> -->
                            </div>
                            <div class="dark:text-white">
                                <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                    <p>
                                        Total Pot
                                    </p>
                                    <div class="flex items-end text-xs">
                                        P10,000.00
                                    
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                        Event Date
                                    </p>
                                    <div class="flex items-end text-xs">
                                        January 13, 2023
                                      
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
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                    Slots Taken
                                    </p>
                                    <div class="flex items-end text-xs">
                                       163
                                    </div>
                                </div>
                                <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                                    <p>
                                       Number of Winners
                                    </p>
                                    <div class="flex items-end text-xs">
                                        1
                                    </div>
                                </div>
                                
                            </div>
                            
                            <button type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                View Event
                            </button>
                        </div>
                        
                    </div>
                    <div class="w-full">
                        <div class="relative w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <p class="text-sm font-semibold text-gray-700 border-b border-gray-200 w-max dark:text-white">
                                Event Name
                            </p>
                            <div class="flex items-end my-6 space-x-2">
                                <!-- <p class="text-5xl font-bold text-black dark:text-white">
                                    12
                                </p> -->
                                <img src='images/lotto.jpg'>
                                <!-- <span class="flex items-center text-xl font-bold text-green-500">
                                    <svg width="20" fill="currentColor" height="20" class="h-3" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1675 971q0 51-37 90l-75 75q-38 38-91 38-54 0-90-38l-294-293v704q0 52-37.5 84.5t-90.5 32.5h-128q-53 0-90.5-32.5t-37.5-84.5v-704l-294 293q-36 38-90 38t-90-38l-75-75q-38-38-38-90 0-53 38-91l651-651q35-37 90-37 54 0 91 37l651 651q37 39 37 91z">
                                        </path>
                                    </svg>
                                    22%
                                </span> -->
                            </div>
                            <div class="dark:text-white">
                                <div class="flex items-center justify-between pb-2 mb-2 text-sm border-b border-gray-200 sm:space-x-12">
                                    <p>
                                        Total Pot
                                    </p>
                                    <div class="flex items-end text-xs">
                                        P10,000.00
                                    
                                    </div>
                                </div>
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                        Event Date
                                    </p>
                                    <div class="flex items-end text-xs">
                                        January 13, 2023
                                      
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
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                    Slots Taken
                                    </p>
                                    <div class="flex items-end text-xs">
                                       163
                                    </div>
                                </div>
                                <div class="flex items-center justify-between space-x-12 text-sm md:space-x-24">
                                    <p>
                                       Number of Winners
                                    </p>
                                    <div class="flex items-end text-xs">
                                        1
                                    </div>
                                </div>
                                
                            </div>
                            
                            <button type="button" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                View Event
                            </button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


   
    </main>
</x-app-layout>

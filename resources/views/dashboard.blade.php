<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />
        <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                    <h1 class="text-4xl font-semibold text-gray-800 white:text-white">
                        Good day, {{ $username }}!
                    </h1>
                    <h2 class="text-gray-400 text-md">
                        Here&#x27;s what&#x27;s happening with your account today.
                    </h2>
                    <div class="flex flex-col items-center w-full my-6 space-y-4 md:space-x-4 md:space-y-0 md:flex-row">
                        <div class="w-full md:w-6/12">
                            <div class="relative w-full overflow-hidden bg-white shadow-lg white:bg-gray-700">
                                <a href="{{ route('transactionhistory.index') }}" class="block w-full h-full">
                                    <div class="flex items-center justify-between px-4 py-6 space-x-4">
                                        <div class="flex items-center">
                                            <span class="relative p-5 bg-yellow-100 rounded-full">
                                                <svg width="40" fill="currentColor" height="40" class="absolute h-5 text-yellow-500 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1362 1185q0 153-99.5 263.5t-258.5 136.5v175q0 14-9 23t-23 9h-135q-13 0-22.5-9.5t-9.5-22.5v-175q-66-9-127.5-31t-101.5-44.5-74-48-46.5-37.5-17.5-18q-17-21-2-41l103-135q7-10 23-12 15-2 24 9l2 2q113 99 243 125 37 8 74 8 81 0 142.5-43t61.5-122q0-28-15-53t-33.5-42-58.5-37.5-66-32-80-32.5q-39-16-61.5-25t-61.5-26.5-62.5-31-56.5-35.5-53.5-42.5-43.5-49-35.5-58-21-66.5-8.5-78q0-138 98-242t255-134v-180q0-13 9.5-22.5t22.5-9.5h135q14 0 23 9t9 23v176q57 6 110.5 23t87 33.5 63.5 37.5 39 29 15 14q17 18 5 38l-81 146q-8 15-23 16-14 3-27-7-3-3-14.5-12t-39-26.5-58.5-32-74.5-26-85.5-11.5q-95 0-155 43t-60 111q0 26 8.5 48t29.5 41.5 39.5 33 56 31 60.5 27 70 27.5q53 20 81 31.5t76 35 75.5 42.5 62 50 53 63.5 31.5 76.5 13 94z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <p class="ml-2 text-sm font-semibold text-gray-700 border-b border-gray-200 white:text-white">
                                                Current Wallet
                                            </p>
                                        </div>
                                        <div class="mt-6 text-xl font-bold text-black border-b border-gray-200 md:mt-0 white:text-white">
                                         P {{ number_format(getUserDetails(auth()->user()->id, 'curr_wallet'),2) }}
                                            
                                        </div>
                                    </div>
                                    <div class="w-full h-3 bg-gray-100">
                                        <div class="w-5/5 h-full text-xs text-center text-white bg-blue-600">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center w-full space-x-4 md:w-1/2">
                            <div class="w-1/2">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg white:bg-gray-700">
                                    <p class="text-2xl font-bold text-black white:text-white">
                                        {{ $activeevents }}
                                    </p>
                                    <p class="text-sm text-gray-400">
                                        Current Active Events
                                    </p>
                                </div>
                              
                            </div>
                            <div class="w-1/2">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg white:bg-gray-700">
                                    <p class="text-2xl font-bold text-black white:text-white">
                                        P{{ number_format($total_profit,2) }}
                                    </p>
                                    <p class="text-sm text-gray-400">

                                   
                                        Total Profit up to Date
                                    </p>
                                    <span class="absolute p-4 bg-purple-500 rounded-full top-2 right-4">
                                        <svg width="40" fill="currentColor" height="40" class="absolute h-4 text-white transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1362 1185q0 153-99.5 263.5t-258.5 136.5v175q0 14-9 23t-23 9h-135q-13 0-22.5-9.5t-9.5-22.5v-175q-66-9-127.5-31t-101.5-44.5-74-48-46.5-37.5-17.5-18q-17-21-2-41l103-135q7-10 23-12 15-2 24 9l2 2q113 99 243 125 37 8 74 8 81 0 142.5-43t61.5-122q0-28-15-53t-33.5-42-58.5-37.5-66-32-80-32.5q-39-16-61.5-25t-61.5-26.5-62.5-31-56.5-35.5-53.5-42.5-43.5-49-35.5-58-21-66.5-8.5-78q0-138 98-242t255-134v-180q0-13 9.5-22.5t22.5-9.5h135q14 0 23 9t9 23v176q57 6 110.5 23t87 33.5 63.5 37.5 39 29 15 14q17 18 5 38l-81 146q-8 15-23 16-14 3-27-7-3-3-14.5-12t-39-26.5-58.5-32-74.5-26-85.5-11.5q-95 0-155 43t-60 111q0 26 8.5 48t29.5 41.5 39.5 33 56 31 60.5 27 70 27.5q53 20 81 31.5t76 35 75.5 42.5 62 50 53 63.5 31.5 76.5 13 94z">
                                            </path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                <div class="h-screen pt-2 pb-24 pl-2 pr-2 overflow-auto md:pt-0 md:pr-0 md:pl-0">
                    <div class="flex flex-col flex-wrap sm:flex-row ">
                        <div class="w-full sm:w-1/2 xl:w-1/3">
                            <div class="mb-4">
                                
                            <div class="relative w-full p-4 overflow-hidden bg-white shadow-lg rounded-xl md:w-100 dark:bg-gray-800">
                                <div class="flex items-center justify-between w-full mb-8">
                                    <p class="text-xl font-normal text-gray-800 dark:text-white">
                                        Recent Transactions
                                    </p>
                                    <a href="{{ route('transactionhistory.index') }}" class="flex items-center text-sm text-gray-300 border-0 hover:text-gray-600 dark:text-gray-50 dark:hover:text-white focus:outline-none">
                                        VIEW ALL
                                    </a>
                                </div>
                               
                                @foreach($alltransactions AS $all)
                                <div class="flex items-start justify-between mb-6 rounded">
                                    <span class="p-2 text-white bg-blue-200 rounded-full dark:text-gray-800">
                                    <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="date-double-check" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="primary" d="M21,7H3A1,1,0,0,0,2,8V20a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V8A1,1,0,0,0,21,7Z" style="fill: #000000;"></path><path id="secondary" d="M22,6V9H2V6A2,2,0,0,1,4,4H20A2,2,0,0,1,22,6ZM9.71,17.71l4-4a1,1,0,0,0-1.42-1.42L9,15.59l-1.29-1.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,1.42,0Zm4,0,4-4a1,1,0,0,0-1.42-1.42l-4,4a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0Z" style="fill: #2ca9bc;"></path><path id="primary-2" data-name="primary" d="M16,7a1,1,0,0,1-1-1V3a1,1,0,0,1,2,0V6A1,1,0,0,1,16,7ZM9,6V3A1,1,0,0,0,7,3V6A1,1,0,0,0,9,6Z" style="fill: #000000;"></path></g></svg>
                                    </span>
                                   
                                    <div class="flex items-center justify-between w-full">
                                        <div class="flex flex-col items-start justify-between w-full ml-2 text-sm">
                                            <p class="text-gray-700 dark:text-white">
                                                @if($all->transfer_id != 0)
                                                    <span class="mr-1 font-bold">
                                                    {{ $all->transaction_type }} 
                                                    </span>
                                                    - 
                                                    @if($all->credit>0) 
                                                           Credited the amount of {{ number_format($all->credit,2) }}
                                                        @else 
                                                          Debited the amount of {{ number_format($all->debit,2) }}
                                                        @endif
                                                    <p class="text-gray-300">
                                                        {{ date('M d, y', strtotime($all->transaction_date))}}
                                                    </p>
                                                @endif

                                                @if($all->event_id == 0 && $all->transfer_id == 0 && $all->bet_id == 0)

                                                        @if($all->credit>0) 
                                                        <span class="mr-1 font-bold">{{ $all->transaction_type }}</span> Credited the amount of {{ number_format($all->credit,2) }}
                                                        @else 
                                                        <span class="mr-1 font-bold">{{ $all->transaction_type }}</span> Debited the amount of {{ number_format($all->debit,2) }}
                                                        @endif

                                                    
                                                    <p class="text-gray-300">
                                                        {{ date('M d, y', strtotime($all->transaction_date))}}
                                                    </p>
                                                @endif

                                                @if($all->event_id != 0 && $all->bet_id != 0)
                                                 

                                                    @if($all->credit>0) 
                                                    <span class="mr-1 font-bold">{{ getEventDetailsFromBet($all->bet_id, "event_name") }} {{ $all->transaction_type }} </span> - Credited the amount of {{ number_format($all->credit,2) }}
                                                    @else 
                                                    <span class="mr-1 font-bold">{{ getEventDetailsFromBet($all->bet_id, "event_name") }} {{ $all->transaction_type }} </span> - Debited the amount of {{ number_format($all->debit,2) }}
                                                    @endif

                                                    <p class="text-gray-300">
                                                        {{ date('M d, y', strtotime($all->transaction_date))}}
                                                    </p>
                                                @endif

                                                @if($all->event_id != 0 && $all->bet_id == 0)
                                                 

                                                    @if($all->credit>0) 
                                                    <span class="mr-1 font-bold">{{ $all->transaction_type }} ({{ $all->transaction_type }}) </span> - Credited the amount of {{ number_format($all->credit,2) }}
                                                    @else 
                                                    <span class="mr-1 font-bold">{{ $all->transaction_type }} ({{ $all->transaction_type }}) </span> - Debited the amount of {{ number_format($all->debit,2) }}
                                                    @endif

                                                    <p class="text-gray-300">
                                                        {{ date('M d, y', strtotime($all->transaction_date))}}
                                                    </p>
                                                @endif
                                            </p>
                                          
                                        </div>
                                    </div>
                                 
                                </div>
                                @endforeach
                            </div>
                          
                            </div>
                           
                                
                        </div>
                        <div class="w-full sm:w-1/2 xl:w-1/3">
                            <div class="mx-0 mb-4 sm:ml-4 xl:mr-4">
                                <div class="w-full bg-white shadow-lg rounded-2xl dark:bg-gray-700">
                                    <p class="p-4 font-bold text-black text-md dark:text-white">
                                        Other Details
                                        <span class="ml-2 text-sm text-gray-500 dark:text-gray-300 dark:text-white">
                                           
                                        </span>
                                    </p>
                                    <ul>
                                        <li class="flex items-center justify-between py-3 text-gray-600 border-b-2 border-gray-100 dark:text-gray-200 dark:border-gray-800">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                 Number of Mayor
                                                </span>
                                                
                                            </div>
                                           <span width="20" height="20" fill="currentColor" class="mx-4 text-green-600 font-bold dark:text-gray-300" viewBox="0 0 1024 1024">
                                           {{ $mayorcount }}
                                            </span>
                                        </li>
                                        <li class="flex items-center justify-between py-3 text-gray-600 border-b-2 border-gray-100 dark:text-gray-200 dark:border-gray-800">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                    Number of Kuridor
                                                </span>
                                               
                                            </div>
                                            <span width="20" height="20" fill="currentColor" class="mx-4 text-green-600 font-bold dark:text-gray-300" viewBox="0 0 1024 1024">
                                                {{ $kuridorcount }}
                                            </span>
                                        </li>
                                        <li class="flex items-center justify-between py-3 text-gray-600 border-b-2 border-gray-100 dark:text-gray-200 dark:border-gray-800">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                    Total Events Created
                                                </span>
                                                
                                               
                                            </div>
                                            <span width="20" height="20" fill="currentColor" class="mx-4 text-green-600 font-bold dark:text-gray-300" viewBox="0 0 1024 1024">
                                                {{ $eventcount }}
                                            </span>
                                        </li>
                                        <li class="flex items-center justify-between py-3 text-gray-600 border-b-2 border-gray-100 dark:border-gray-800">
                                            <div class="flex items-center justify-start text-sm">
                                                <span class="mx-4">
                                                    Total Number of Bettors
                                                </span>
                                              
                                            </div>
                                            <span width="20" height="20" fill="currentColor" class="mx-4 text-green-600 font-bold dark:text-gray-300" viewBox="0 0 1024 1024">
                                                {{ $bettors }}
                                            </span>
                                        </li>
                                      
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                        <div class="w-full sm:w-1/2 xl:w-1/3">
                            <div class="mb-4">
                            <div class="w-full p-4 bg-white shadow-lg rounded-2xl dark:bg-gray-700">
                                    <p class="font-bold text-black text-md dark:text-white">
                                        Recently Closed Events
                                    </p>
                                    @php $count_closed = count($closed_events); @endphp
                                    @if($count_closed == 0)
                                        <p class="text-center">No data available.</p>
                                    @else
                                    <ul>
                                        @foreach($closed_events AS $ce)
                                        @if($ce->win_flag == 0)
                                          @php $bg = 'bg-red-200'; @endphp
                                        @else
                                        @php $bg = 'bg-white'; @endphp
                                        @endif
                                        <a href="{{ route('finishedevents') }}">
                                        <li class="flex items-center justify-between py-3 text-gray-600 {{ $bg }}">
                                            <div class="flex flex-col justify-start text-sm">
                                                <span class="ml-2">
                                                {{ $ce->event_name }} <br>
                                                </span>
                                                <span class="ml-2 text-xs text-gray-400 dark:text-gray-300">
                                                    @if($ce->win_flag == 1)
                                                     No. of Winners: {{ $ce->no_of_winners }}<br>
                                                    @else
                                                     <span class='text-red-700'>This event needs to be finalized.</span><br>
                                                    @endif
                                                    Close Date: {{ date('M d H:i:s', strtotime($ce->date_end)) }}
                                                 </span>
                                              
                                            </div>
                                            <span width="20" height="20" fill="currentColor" class="mx-4 text-green-600 font-bold dark:text-gray-300" viewBox="0 0 1024 1024">
                                            P{{ number_format($ce->running_balance,2) }}
                                            </span>
                                        </li>
                                        </a>
                                        
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
<script src="{{ URL::asset('js/jquery.min.js') }}">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tsparticles-preset-confetti@2/tsparticles.preset.confetti.bundle.min.js"></script>
<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />
        <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                    <h1 class="text-4xl font-semibold text-gray-800 white:text-white">
                      
                            Good day, {{ $username}}!
                   
                    </h1>
                    <h2 class="text-gray-400 text-md">
                        Here&#x27;s what&#x27;s happening with your account today.
                    </h2>
                    @if($usertype=='Coridor')
                        @if(empty($user_image))
                     
                        <br>
                        <div class="flex flex-wrap items-center gap-4">
                            <span class="px-4 py-2  text-base rounded-full text-red-600  bg-red-200 ">
                            You have not uploaded your picture yet. Kindly upload <a style="text-decoration:underline" href="{{ route('upload_image') }}">here.</a>
                            </span>
                        </div>
                        @endif
                    @endif

                    @if (session('lastlogin'))
                    <br>
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="px-4 py-2  text-base rounded-full text-green-600  bg-green-200 ">
                            {{ session('lastlogin') }}
                            <script type="text/javascript">
                            confetti();
                            </script>
                        </span>
                    </div>
                    @endif
                    <div class="flex flex-col items-center w-full my-6 space-y-4 md:space-x-4 md:space-y-0 md:flex-row">
                        <div class="w-full md:w-4/12">
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
                                           P {{ number_format(getUserDetails($userid, 'curr_wallet'),2)  }}
                                           
                                        </div>
                                    </div>
                                    <div class="w-full h-3 bg-gray-100">
                                        <div class="w-5/5 h-full text-xs text-center text-white bg-green-400">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center w-full space-x-4 md:w-8/12">
                            <div class="w-2/3">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg white:bg-gray-700">
                                    <p class="text-2xl font-bold text-black white:text-white">
                                        {{ getActiveDownline($userid, $usertype,'active') }} /  {{ getActiveDownline($userid, $usertype,'all') }} 
                                    </p>
                                    <p class="text-sm text-gray-400">
                                      Active vs. Total Registrants
                                    </p>
                                </div>
                            </div>
                            <div class="w-2/3">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg white:bg-gray-700">
                                    <p class="text-2xl font-bold text-black white:text-white">
                                        {{ getRegistered($userid, $usertype, 'today') }} /   {{ getRegistered($userid, $usertype, 'month') }}
                                    </p>
                                    <p class="text-sm text-gray-400">
                                       Registered Today / This Month
                                    </p>
                                </div>
                            </div>
                            
                            <div class="w-2/3">
                                <div class="relative w-full px-4 py-6 bg-white shadow-lg white:bg-gray-700">
                                    <p class="text-2xl font-bold text-black white:text-white">
                                        
                                        P{{ number_format(getTotalEarnings($userid, $usertype),2) }}
                                    </p>
                                    <p class="text-sm text-gray-400">
                                        Total Earnings up to Date
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
                   
                    @if(session('status'))
                        @if(session('status') == 'success')
                        <div class="flex flex-wrap items-center gap-4">
                            <span class="px-4 py-2  text-base rounded-full text-green-600  bg-green-200 ">
                                {{ session('message_success') }}
                            </span>
                        </div>
                        @else
                        <div class="flex flex-wrap items-center gap-4">
                                <span class="px-4 py-2  text-base rounded-full text-red-600  bg-red-200 ">
                                    {{ session('message_fail') }}
                                </span>
                            </div>
                        @endif
                    @endif
                    <div class="grid grid-cols-1 gap-4 my-4 md:grid-cols-2 lg:grid-cols-3">
                    @php $count=1; @endphp
                    @foreach($events AS $ev)
                     @php $countbet = countUserBet($userid,$ev->id); 
                           @endphp
                    <div class="w-full" id="event_block_{{ $count }}">
                        <div class="relative  w-full px-4 py-6 bg-white shadow-lg dark:bg-gray-700">
                            <div class="flex items-center justify-between ">
                                <p class="text-md font-semibold text-gray-700 border-b border-gray-200 w-full dark:text-white">
                                {{ $ev->event_name}}
                                </p>
                                <div class="text-xs flex items-end font-semibold text-red-700 border-b border-red-200 w-max dark:text-white" >
                                        @if($countbet>0)
                                       <a href="#" data-modal-target="existing-modal-{{ $count }}" data-modal-toggle="existing-modal-{{ $count }}"> Existing Bets: {{ $countbet }}</a>
                                        @endif
                                </div>
                            </div>
                           
                            <div class="items-center  my-6 space-x-2" >
                              
                                <center>
                                <img src="{{ URL::asset('images/game_category/'. $ev->event_image) }}" style='height:200px'>
                                </center>
                             
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
                                <div class="flex items-center justify-between pb-2 mb-2 space-x-12 text-sm border-b border-gray-200 md:space-x-24">
                                    <p>
                                        Remaining Hours
                                    </p>
                                    <div id="demo_{{ $count }}" class="flex items-end text-xs">
                                   
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            timer({{ $count }}, {{ $ev->id }})
                                        });
                                    </script>
                                                                    
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
                            <input type="hidden" name="curr_wallet" id="curr_wallet" value="{{ $curr_wallet }}">
                            @if($countbet==0)
                                <button type="button" data-modal-target="authentication-modal-{{ $count }}" data-modal-toggle="authentication-modal-{{ $count }}" id="join_button_{{ $count }}" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    Join Event
                                </button>
                            @else 
                                <button type="button" data-modal-target="authentication-modal-{{ $count }}" data-modal-toggle="authentication-modal-{{ $count }}" id="join_button_{{ $count }}" class="py-2 px-4  bg-green-600 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                    Make Another Bet
                                </button>
                            @endif
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
                                            
                                            Current Wallet
                                        </button>
                                        <button type="button" class="w-full px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                                            <strong>P {{ number_format($curr_wallet,2) }} </strong>
                                        </button>
                                    </div><br>
                                    <p>
                                   
                                    <span class="text-sm text-blue-700 hover:underline dark:text-blue-500">{{ date('M j, Y H:i',strtotime($ev->date_start)) }} to  {{  date('M j, Y H:i',strtotime($ev->date_end)) }}
                                        <br>Current Pot: {{ number_format($ev->running_balance,2) }}
                                        <br>Price per Entry: {{ number_format($ev->slot_price,2) }}</span>    
                                    <br><br>{!! $ev->event_description !!} 
                                   
                                    </p>
                                    <form class="space-y-6" action="{{ route('place_bet_admin', ['count'=>$count]) }}" method="POST">
                                    @csrf
                                    @if(!empty($ev->choice_array))
                                        @php $choices = explode(", " , getChoiceArray($ev->id)); 
                                            $count_choices = count($choices);    
                                        @endphp
                                      
                                   
                                       
                                    @if($curr_wallet < $ev->slot_price)
                                        <div class="bg-red-200  border-red-600 text-red-600 border-l-4 p-4 text-sm" role="alert">
                                            You can't join this event. Insufficient wallet amount.
                                        </div>
                                            
                                        @else
                                        <div>

                                        @php $a=1; @endphp
                                        @for($x=0;$x<$count_choices;$x++)

                                        @if(checkExistingQuestionBank($choices[$x]) > 0)
                                            @php $c= getChoicesMinmax($choices[$x]);
                                                $c_arr = explode('-',$c);
                                                $start = $c_arr[0];
                                                $end = $c_arr[1];
                                            @endphp
                                        @else 
                                         @php
                                                $start = 0;
                                                $end = 9;
                                            @endphp
                                        @endif
                                        <label class='text-gray-600'>{{ $choices[$x] }}</label>
                                              <select name="choice_{{ $count }}_{{ $a }}" id="choice_{{ $count }}_{{ $a }}" required  class="rounded-lg flex-1 appearance-none border border-gray-300 py-2 px-4 bg-gray-50  text-gray-900 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent w-full" >
                                                <option value=''>-Choose {{ ordinal($a) }} number-</option>
                                                @for($i=$start; $i<=$end;$i++)
                                                    <option value='{{ $i }}'>{{ $i }}</option>
                                                @endfor
                                              </select><br><br>
                                          @php $a++; @endphp
                                        @endfor
                                      
                                        </div>
                                        
                                        <center>
                                        <input type="text" id="bet_{{ $count }}" name="bet_{{ $count }}" oninput="betChecker(this.value, {{ $count }})" onkeypress="return onlyNumberKey(event)" required  class=" rounded-lg flex-1 appearance-none border border-gray-300 py-2 px-4 bg-gray-50  text-gray-900 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Number of Entries"/>
                                     
                                      <br><br>
                                      <div id="amount_{{ $count }}">Total Bet Price: P<span id="totalbet_{{ $count }}">0.00</span></div>

<span id="finalize_message_{{ $count }}" style="display:none" class='text-red-700 text-sm'>You might wanna review your bet for the last time. Click Finalize Bet to proceed.</span>
                                        </center>
                                        
                                        <input type="hidden" name="choice_count_{{ $count }}" id="choice_count_{{ $count }}" value="{{ $count_choices }}">
                                        <input type="hidden" name="slot_price_{{ $count }}" id="slot_price_{{ $count }}" value="{{ $ev->slot_price }}">
                                        <button type="button" id="placebet_{{ $count }}" onclick="finalizebet({{ $count }})" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Place Bet</button>
                                        <button type="submit" id="finalizebet_{{ $count }}" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" style='display:none'>Finalize Bet</button>
                                           
                                        @endif
                                    
                                    @else
                                        @php $choices = explode("-" , getChoiceArray($ev->id));
                                              $min = $choices[0];
                                              $max = $choices[1];
                                              $outcomes = getGameCatDetails($ev->game_category_id, 'no_of_outcomes'); 
                                        @endphp
                                    @if($curr_wallet < $ev->slot_price)
                                        <div class="bg-red-200  border-red-600 text-red-600 border-l-4 p-4 text-sm" role="alert">
                                            You can't join this event. Insufficient wallet amount.
                                        </div>
                                            
                                        @else
                                           
                                                @for($y=1;$y<=$outcomes;$y++)
                                                @php $c= getChoiceArray($ev->id);
                                                        $c_arr = explode('-',$c);
                                                        $start = $c_arr[0];
                                                        $end = $c_arr[1];
                                                    @endphp
                                                     
                                                     <select name="choice_{{ $count }}_{{ $y }}" id="choice_{{ $count }}_{{ $y }}" required  class="rounded-lg flex-1 appearance-none border border-gray-300 py-2 px-4 bg-gray-50  text-gray-900 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent w-full" >
                                                        <option value=''>-Choose answer-</option>
                                                        @for($i=$start; $i<=$end;$i++)
                                                            <option value='{{ $i }}'>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                @endfor
                                           
                                            <input type="hidden" name="min_{{ $count }}" id="min_{{ $count }}" value="{{ $min }}">
                                            <input type="hidden" name="max_{{ $count }}" id="max_{{ $count }}" value="{{ $max }}">

                                        
                                                <center>
                                                <input type="text" class="choices_{{ $count }} " id="bet_{{ $count }}" name="bet_{{ $count }}" oninput="betChecker(this.value, {{ $count }})" class=" rounded-lg flex-1 appearance-none border border-gray-300 py-2 px-4 bg-gray-50  text-gray-900 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Number of Entries" required/>
                                               <br><br>
                                               <div id="amount_{{ $count }}">Total Bet Price: P<span id="totalbet_{{ $count }}">0.00</span></div>

                                                <span id="finalize_message_{{ $count }}" style="display:none" class='text-red-700 text-sm'>You might wanna review your bet for the last time. Click Finalize Bet to proceed.</span>
                                                </center>
                                                <input type="hidden" name="choice_count_{{ $count }}" id="choice_count_{{ $count }}" value="{{ $outcomes }}">
                                                <input type="hidden" name="slot_price_{{ $count }}" id="slot_price_{{ $count }}" value="{{ $ev->slot_price }}">
                                                <button type="button" id="placebet_{{ $count }}" onclick="finalizebet({{ $count }})" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Place Bet</button>
                                        <button type="submit" id="finalizebet_{{ $count }}" class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" style='display:none'>Finalize Bet</button>
                                         @endif

                                    @endif
                                    <input type="hidden" name="slotprice_{{ $count }}" id="slotprice_{{ $count }}" value="{{ $ev->slot_price }}">
                                    <input type="hidden" name="gamecat_{{ $count }}" id="gamecat_{{ $count }}" value="{{ $ev->game_category_id }}">
                                    <input type="hidden" name="event_{{ $count }}" id="event_{{ $count }}" value="{{ $ev->id }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 



                    <!--   EXISTING MODAL -->

                    <div id="existing-modal-{{ $count }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                        <div class="relative w-full h-full max-w-2xl md:h-auto">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    {{ $ev->event_name }}
                                    </h3>
                                    <div style="padding-left:50px" class="flex items-end">
                                   
                                   <button type="button" class="py-2 px-4 flex justify-center items-center  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-max transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                      Existing Bets
                                   </button>
                                   <button type="button" class="w-max px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                                       <strong> {{ $countbet }} </strong>
                                   </button>
                               </div>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="existing-modal-{{ $count }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-6 space-y-6">
                               
                               
                                <center>
                                <table class="table p-4 bg-white rounded-lg shadow text-sm">
                                    <thead>
                                        <tr>
                                            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                                                #
                                            </th>
                                            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                                                Date
                                            </th>
                                            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                                                Choice
                                            </th>
                                            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                                                Slot Price
                                            </th>
                                            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                                                Slot Taken
                                            </th>
                                            <th class="border-b-2 p-4 dark:border-dark-5 whitespace-nowrap font-normal text-gray-900">
                                                Amount
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $betct = 1; @endphp
                                        @foreach(getBets($ev->id, $userid) AS $bets) 
                                        <tr class="text-gray-700">
                                            <td class="border-b-2 p-4 dark:border-dark-5">
                                                {{ $betct }}
                                            </td>
                                            <td class="border-b-2 p-4 dark:border-dark-5">
                                                {{ $bets->bet_date }}
                                            </td>
                                            <td class="border-b-2 p-4 dark:border-dark-5">
                                               {{ $bets->bet_choice }}
                                            </td>
                                            <td class="border-b-2 p-4 dark:border-dark-5">
                                                {{ $bets->slot_price }}
                                            </td>
                                            <td class="border-b-2 p-4 dark:border-dark-5">
                                                {{ $bets->bet_slots }}
                                            </td>
                                            <td class="border-b-2 p-4 dark:border-dark-5">
                                                {{ $bets->bet_total }}
                                            </td>
                                        </tr>
                                        @php $betct++; @endphp
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                        </center>
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
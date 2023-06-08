<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />

    <x-header />
 <link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.min.css') }}">
<div class="h-screen px-4 pb-24 overflow-auto md:px-6">
    <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                   Events Joined
                </h1>
              
                
    <div class="py-8">
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal" id="table_overall">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Event Name
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Bet Date
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Choice
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Winning Answer
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Price per Entry
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Slots Taken
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Total Bet Amount
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                No. of Winners
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                 Pot Amount
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                 Amount Won
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                 Image Result
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                 URL Result
                            </th>
                            
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                 Status
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($bets AS $b)
                        @if($b->bet_choice == $b->win_array)
                            @php $bg = "bg-green-100" @endphp
                        @else
                            @php $bg = "bg-white" @endphp
                        @endif
                        <tr>
                            <td class="px-5 py-5 text-sm {{ $bg }} border-b border-gray-200">
                                <div class="flex items-center">
                                   
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $b->event_name}}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 text-sm  {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                     {{ date("M d, Y", strtotime($b->bet_date)) }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm  {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ $b->bet_choice }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ $b->win_array }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($b->slot_price,2) }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ $b->bet_slots }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($b->bet_total,2) }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ $b->no_of_winners,2 }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($b->running_balance,2) }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format(getAmountWon($b->user_id, $b->event_id),2) }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm  {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                @if(!empty($b->result_image))
                                <a href="{{ URL::asset('images/results/'. $b->result_image) }}" target="_blank"><img src="{{ URL::asset('images/results/'. $b->result_image) }}" width="40px"> </a>
                                @endif
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm {{ $bg }} border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ $b->url_result }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm {{ $bg }}border-b border-gray-200">
                                @if(checkEventStatus($b->event_id) > 0) 
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-red-900">
                                    <span aria-hidden="true" class="absolute inset-0 bg-red-200 rounded-full opacity-50">
                                    </span>
                                    <span class="relative text-xs">
                                        Closed
                                    </span>
                                </span> 
                                @else
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 rounded-full opacity-50">
                                    </span>
                                    <span class="relative text-xs">
                                        Ongoing
                                    </span>
                                </span> 
                                @endif
                            </td>
                          
                        </tr>
                       @endforeach
                    </tbody>
                </table>
              
            </div>
        </div>
    
</div>
         
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_overall').DataTable();
    } );
</script>
    </main>
</x-app-layout>

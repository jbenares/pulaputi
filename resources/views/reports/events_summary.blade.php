<x-app-layout>
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />

    <x-header />
 <link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.min.css') }}">

 <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                  Events Summary
                </h1>

         <div class="container max-w-3xl px-4 mx-auto sm:px-8">
  
  <div class="p-6 mt-8">
                <div class="flex items-center">
                <form method="GET">
                    <table>
                        <tr>
                        <td> <select name="king" required class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-52 focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="animals">
                                <option value="" selected>Select King</option>
                                @foreach($kings AS $k)
                                <option value="{{ $k->id }}">{{ $k->name }}</option>
                                @endforeach
                            </select></td>
                            <td>
                            <select name="year" class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-52 focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="animals">
                                <option value="">Select Year</option>
                                @for($x=2023;$x<=$curr_year;$x++)
                                <option value="{{ $x }}">{{ $x }}</option>
                                @endfor
                             
                            </select>
                            </td>
                            <td> <select name="month" class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-52 focus:outline-none focus:ring-primary-500 focus:border-primary-500" name="animals">
                                <option value="" selected>Select Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select></td>
                   
                          
                           
                            <td><button type="submit" name="filter" class="py-2 px-4 flex justify-center items-center  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-max transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                Filter
                                </button></td>
                        </tr>
                    </table>
              
                </form>  
                </div>
            </div>
        </div>   
      
@if($filters['status'] == 'filter')
   
                <div class="flex items-center" style="width:80%">
                    <button class="py-2 px-4 flex justify-center items-center  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-max transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                       King
                    </button>
                    <button class="w-max px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                        <strong>{{ getUserDetails($filters['king'],'name') }} </strong>
                    </button>
                    <button class="py-2 px-4 flex justify-center items-center  bg-purple-600 hover:bg-purple-700 focus:ring-purple-500 focus:ring-offset-purple-200 text-white w-max transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                       Month/Year
                    </button>
                    <button class="w-max px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                        <strong>{{ $filters['month'] . " " . $filters['year'] }} </strong>
                    </button>
                    <button class="py-2 px-4 flex justify-center items-center  bg-green-600 hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 text-white w-max transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                       Total Pot
                    </button>
                    <button class="w-max px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                        <strong>P {{ number_format($totalpot,2) }}</strong>
                    </button>
                    <button class="py-2 px-4 flex justify-center items-center  bg-yellow-300 hover:bg-yellow-500 focus:ring-yellow-500 focus:ring-offset-yellow-200 text-white w-max transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                       Total Wins
                    </button>
                    <button class="w-max px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                        <strong>P {{ number_format($totalwins,2) }}</strong>
                    </button>
                </div>
               
                <div class="h-screen px-4 pb-24 overflow-auto md:px-6">      
    <div class="py-8">
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal" id="table_overall">
                    <thead>
                        <tr>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Date  Start/End
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Events
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                               Status
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                               Pot Per Game
                            </th>
                           
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                No. of Bets
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Running Balance
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                No. of Wins
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Total Wins
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($events AS $e)
                        <tr>
                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ $e->date_start ." to ".  $e->date_end }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <div class="flex items-center">
                                   
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                           {{ $e->event_name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                 @if($e->win_flag == 1)
                                    Done
                                 @else 
                                    Ongoing
                                 @endif
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($e->initial_pot,2) }}
                                </p>
                            </td>
                         
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ getTotalSlots($e->id) }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($e->running_balance,2) }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ $e->no_of_winners }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($e->running_balance,2) }}
                                </p>
                              
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
              
            </div>
        </div>
    
</div>
@endif
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_overall').DataTable({
            order: [[0, 'desc']],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    } );
</script>
    </main>
</x-app-layout>

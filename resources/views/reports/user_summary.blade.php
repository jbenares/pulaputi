<x-app-layout>
    
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />

    <x-header />
 <link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.min.css') }}">

 <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                  User Summary
                </h1>

         <div class="container max-w-3xl px-4 mx-auto sm:px-8">
  
  <div class="p-6 mt-8">
                <div class="flex items-center">
                <form method="GET">
                    <table>
                        <tr>
                            <td>Date From:</td>
                        <td> <input type='date' name='date_from' class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-52 focus:outline-none focus:ring-primary-500 focus:border-primary-500" ></td>
                            <td>
                            <td>Date To:</td>
                            </td>
                            <td> <input type='date' name='date_to' class="block px-3 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm w-52 focus:outline-none focus:ring-primary-500 focus:border-primary-500" ></td>
                   
                          
                           
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
                       Date Range
                    </button>
                    <button class="w-max px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                        <strong>{{ $filters['date_from'] . " to " . $filters['date_to'] }} </strong>
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
                                Account
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                               UserType
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                               Date
                            </th>
                         
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                               Betting Commission
                            </th>
                           
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Winnings From Event
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Load Wallet
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Betting Amount
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Registration
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Event Creation
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                               Wallet Transfer
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Daily Wallet
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($accounts AS $a)
                        <tr>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <div class="flex items-center">
                                   
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                       {{ $a[0]['name'] }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ $a[0]['usertype'] }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ $a[0]['date'] }}
                                </p>
                            </td>
                         
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($a[0]['commission'],2) }}
                                </p>
                            </td>
                         
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($a[0]['winnings'],2) }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($a[0]['load'],2) }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($a[0]['betting'],2) }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($a[0]['registration'],2) }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($a[0]['event_creation'],2) }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($a[0]['transfers'],2) }}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($a[0]['daily'],2) }}
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

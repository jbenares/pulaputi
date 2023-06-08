<x-app-layout>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />

    <x-header />
 <link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.min.css') }}">
<div class="h-screen px-4 pb-24 overflow-auto md:px-6">
    <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                   Transaction History
                </h1>
                <!-- <h2 class="text-gray-400 text-md">
                    Here&#x27;s what&#x27;s happening with your ambassador account today.
                </h2> -->
                <!-- <br>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('events.create') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Create an Event
                    </a>
                    <a href="{{ route('finishedevents') }}" class="flex items-center px-4 py-2 text-red-600 border border-red-600 rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Finished Events
                </a>
                 

                   
                </div> --><br>
                <div class="flex items-center" style="width:40%">
                    <button type="button" class="py-2 px-4 flex justify-center items-center  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        
                        Current Wallet
                    </button>
                    <button type="button" class="w-full px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                        <strong>P{{ number_format($curr_wallet,2) }} </strong>
                    </button>
                </div>
              
    <div class="py-8">
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal" id="table_overall">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Transaction Date
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Transaction Type
                            </th>
                            @if($usertype=='Admin')
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Cashin Method
                            </th>
                            @endif
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Debit
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                Credit
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getwallet AS $wallet)
                        <tr>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <div class="flex items-center">
                                   
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ date("Y-m-d",strtotime($wallet->transaction_date)) }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    @if(str_contains($wallet->transaction_type, 'Registration'))
                                     @php
                                        $reg = explode('#',$wallet->transaction_type);
                                        $name = getUserDetailsCustom("ref_code", $reg[1], 'name');
                                        $mobile = getUserDetailsCustom("ref_code", $reg[1], 'mobile');
                                     @endphp
                                     {{ $reg[0] . " " .  $name . "/" . $mobile}}
                                    @else 
                                    {{ $wallet->transaction_type . " ". (!empty($wallet->event_id) ? "- ".  getEventdetails($wallet->event_id,'event_name') :"") }}
                                    @endif
                                </p>
                            </td>
                            @if($usertype=='Admin')
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                {{ $wallet->cashin_method }}
                            </th>
                            @endif
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                   {{ number_format($wallet->debit,2)}}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                {{ number_format($wallet->credit,2)}}
                                </p>
                              
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <a href="{{ route('transactionreceipt',$wallet->id) }}">
                                  <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                    <span aria-hidden="true" class="absolute inset-0 bg-green-200 rounded-full opacity-50">
                                    </span>
                                    <span class="relative text-xs">
                                        View Receipt
                                    </span>
                                </span> 
                                </a>
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

<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.min.css') }}">
    <x-sidebar />
    <x-header />



<div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                   King List
                </h1>
                <!-- <h2 class="text-gray-400 text-md">
                    Here&#x27;s what&#x27;s happening with your ambassador account today.
                </h2> -->
                <br>
                <div class="flex items-center space-x-4">
             
                 <a href="{{ route('registerking') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Register King
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
              
                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                        <table class="min-w-full leading-normal" id="table_overall">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                        Full Name
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                        Mobile
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                        No. of Kings
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                        No. of Events
                                    </th>
                                   
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                       Current Wallet
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count=1; @endphp
                                @foreach($kings AS $p)

                                <tr>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <div class="flex items-center">
                                           
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                   {{ $p->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                   
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $p->mobile }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{  getActiveDownline($p->id, 'King', 'all') }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ getEventsCreated($p->id) }}
                                        </p>
                                    </td>
                                 
                                    
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        P{{ number_format($p->curr_wallet,2) }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    
                                    <!-- <button data-modal-target="authentication-modal-{{ $count }}" data-modal-toggle="authentication-modal-{{ $count }}" class="relative inline-block px-3 py-1 font-semibold leading-tight text-blue-900">
                                            <span aria-hidden="true" class="absolute inset-0 bg-blue-200 rounded-full opacity-50">
                                            </span>
                                            <span class="relative">
                                                Add Wallet
                                            </span></button> -->
                                        <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                            <span aria-hidden="true" class="absolute inset-0 bg-green-200 rounded-full opacity-50">
                                            </span>
                                            <span class="relative">
                                            <a href="{{ route('view_profile', $p->id) }}">View</a>
                                            </span>
                                        </span>
                                    </td>
                                </tr>

                                

                                    <div id="authentication-modal-{{ $count }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">                   
                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal-{{ $count }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                    <div class="px-6 py-6 lg:px-8">
                                                    <div class="flex items-center">
                                                        <button type="button" class="py-2 px-4 flex justify-center items-center  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                                            
                                                            Full Name
                                                        </button>
                                                        <button type="button" class="w-full px-4 py-2 text-base font-medium text-black bg-white border rounded-r-md hover:bg-gray-100">
                                                            <strong> {{ $p->name }}</strong>
                                                        </button>
                                                    </div><br>
                                                    <p>
                                                
                                                    </p><br>
                                                    <form class="space-y-6" action="{{ route('add_wallet', ['count'=>$count]) }}" method="POST">
                                                     @csrf
                                                     Add Wallet Amount
                                                    <input type="text" name="wallet_{{ $count }}" id="wallet_{{ $count }}" required onblur="checkamount(this.value, {{ $count }})" class=" rounded-lg flex-1 appearance-none border border-gray-300 py-2 px-4 bg-gray-50  text-gray-900 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent w-full" >
                                                    <span class="text-red-500 text-xs" id='wallet_error_{{ $count }}'></span><br><br>
                                                    <input type="hidden" name="user_id_{{ $count }}" id="user_id_{{ $count }}" value="{{ $p->id}} " >
                                                    
                                                    <button type="submit" id="submit_{{ $count }}" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Wallet</button>
                                        
                                                
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                @php $count++; @endphp
                                @endforeach
                                <input type="hidden" name="user_wallet" id="user_wallet" value="{{ $userwallet}} " >
                            </tbody>
                        </table>
                       
            </div>
        </div>
        
    </main>
</x-app-layout>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_overall').DataTable();
    } );
</script>
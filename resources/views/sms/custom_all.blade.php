<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.min.css') }}">
    <x-sidebar />
    <x-header />



<div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                  Custom Messages
                </h1>
                <!-- <h2 class="text-gray-400 text-md">
                    Here&#x27;s what&#x27;s happening with your ambassador account today.
                </h2> -->
                <br>
                <div class="flex items-center space-x-4">
             
                 <a href="{{ route('create_message') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Create Message
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
                                       Sent Date
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                       Sent By
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                        Message
                                    </th>
                                   
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-white border-b border-gray-200">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count=1; @endphp
                             

                                <tr>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <div class="flex items-center">
                                           
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                 
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        
                                        </p>
                                    </td>
                                   
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        
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
                                            <a href="">Resend</a>
                                            </span>
                                        </span>
                                    </td>
                                </tr>

                                

                                
                              
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
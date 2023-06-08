<x-app-layout>
    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.min.css') }}">
    <x-sidebar />
    <x-header />


    <!-- <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 ">
    <ul class="flex flex-wrap -mb-px">
        <li class="mr-2">
            <a href="{{ route('registermayor.create') }}" class="inline-block p-4 border-b-2 rounded-t-lg  hover:text-gray-600 hover:border-gray-300 ">
                Register Mayor/Coridor
            </a>
        </li>
    
        <li class="mr-2">
            <a href="{{ route('createphakbet') }}" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 ">
            Register Phakbet
            </a>
        </li>
      
    </ul>
</div> -->

<div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                    @if($usertype=='King')
                        Mayor/Kuridor List
                   @elseif($usertype=='Mayor') 
                     Kuridor List 
                    @endif
                </h1>
                <!-- <h2 class="text-gray-400 text-md">
                    Here&#x27;s what&#x27;s happening with your ambassador account today.
                </h2> -->
                <br>
                <div class="flex items-center space-x-4">
                   

                    @if($usertype=='King')
                        <a href="{{ route('registermayor.create') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                            Register Mayor/Kuridor
                        </a>
                        <a href="{{ route('createphakbet') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                             Register Phakbet
                        </a>
                        <a href="{{ route('phakbetlist') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                         Phakbet List
                        </a>
                    @elseif($usertype=='Mayor')  
                        <a href="{{ route('registermayor.create') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                            Register Kuridor
                        </a>
                        <a href="{{ route('createphakbet') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                            Register Phakbet
                         </a>
                    
                        <a href="{{ route('phakbetlist') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                            Phakbet List
                        </a>
                    
                    @elseif($usertype=='Coridor')  
                    <a href="{{ route('createphakbet') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                        Register Phakbet
                    </a>
                    <a href="{{ route('phakbetlist') }}" class="flex items-center px-4 py-2 text-blue-600 border border-blue-600  rounded-r-full rounded-tl-sm rounded-bl-full text-md ">
                            Phakbet List
                    </a>
                    
                    @endif
                   
                </div>

         
          
                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                        <table class="min-w-full leading-normal" id="table_overall">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Usertype
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Mayor
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Full Name
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Email
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Region
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        City
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Ref Code
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Current Wallet
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mayors AS $may)
                                <tr>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <div class="flex items-center">
                                           
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                     @if($may->usertype == 'King' || $may->usertype == 'Mayor' )
                                                        {{ $may->usertype }}
                                                     @else 
                                                        Kuridor
                                                      @endif
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                         @if($may->usertype=='Coridor')
                                           {{ getUpline('mayor', $may->id, 'name'); }} 
                                         @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $may->name }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $may->email }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $may->region }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $may->city }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $may->ref_code }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $may->curr_wallet }}
                                        </p>
                                    </td>
                                   
                                    <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                        <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-blue-900">
                                            <span aria-hidden="true" class="absolute inset-0 bg-blue-200 rounded-full opacity-50">
                                            </span>
                                            <span class="relative">
                                                <a href="" onclick="confirmation({{ $may->id }})"> Reset PW </a>
                                            </span>
                                        </span>
                                        <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                            <span aria-hidden="true" class="absolute inset-0 bg-green-200 rounded-full opacity-50">
                                            </span>
                                            <span class="relative">
                                                <a href="{{ route('view_profile', $may->id) }}">View</a>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                      
               
            </div>
        </div>
        
    </main>
</x-app-layout>
<script type="text/javascript">
    function confirmation(id){
        let text = "Are you sure you want to reset the password?\nNew password will be sent thru email.";
        if (confirm(text) == true) {
           alert('hi');
        } else {
            alert('no');
        }
     }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_overall').DataTable();
    } );
</script>
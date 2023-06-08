<x-app-layout>
    
  
       <br><br><br>
       <center>
    <a href="{{ route('transactionhistory.index') }}" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
         Go Back
    </a>
</center><br>

        <div class="relative w-max p-4 m-auto bg-white shadow-lg rounded-2xl dark:bg-gray-900">
            <div class="w-full h-full ">
                <div class="flex flex-col justify-between h-full">
                <center>
                <svg fill="#000000" width="144px" height="144px" viewBox="0 0 24 24" id="file-folder-approved" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="secondary" d="M18,2H6A2,2,0,0,0,4,4v7a1,1,0,0,0,1,1H19a1,1,0,0,0,1-1V4A2,2,0,0,0,18,2Z" style="fill: #2ca9bc;"></path><path id="primary" d="M12.51,18.07A6.63,6.63,0,0,1,18,14a6.43,6.43,0,0,1,4,1V12a2,2,0,0,0-2-2H11.4L9.7,8.29A1,1,0,0,0,9,8H4a2,2,0,0,0-2,2V20a2,2,0,0,0,2,2h8.19A6.18,6.18,0,0,1,12.51,18.07Z" style="fill: #000000;"></path><path id="secondary-2" data-name="secondary" d="M17,22a1,1,0,0,1-.71-.29l-2-2a1,1,0,0,1,1.42-1.42L17,19.59l3.29-3.3a1,1,0,0,1,1.42,1.42l-4,4A1,1,0,0,1,17,22Z" style="fill: #2ca9bc;"></path></g></svg>
                </center>    
                    <p class="absolute text-sm italic text-gray-800 dark:text-white top-2 right-2">
                        by Phakbet
                    </p>
                    <p class="mt-4 text-lg text-green-700 dark:text-green text-center">
                        Transaction Receipt
                    </p>
                   @foreach($details AS $d)
                    <p class="px-6 py-2 text-sm flex font-thin text-gray-700 dark:text-gray-50">
                        @if(!empty($d->event_id))
                            Event Name: {{ getEventdetails($d->event_id, 'event_name') }}<br>
                        @endif
                       Transaction Date: {{ $d->transaction_date }}<br>
                       Transaction Type: {{ $d->transaction_type }}<br>
                       Transaction Amount: 
                       @if($d->debit>0)
                       {{ number_format($d->debit,2) }}
                       @else
                        {{ number_format($d->credit,2) }} 
                        @endif<br>
                     
                    </p>
                    <p class="mt-4 text-sm text-gray-900 dark:text-white text-center">
                        Payment Reference: {{ $d->transaction_reference }}
                    </p>
                    @endforeach
                </div>
            </div>
        </div>


   
 </x-app-layout>
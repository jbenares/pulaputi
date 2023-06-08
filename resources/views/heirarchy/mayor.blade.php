<x-app-layout>

    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />


        <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
                <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                Heirarchy
                </h1>
               
        @php $count=1; @endphp

        @if(count($coridors) == 0)

                <br><br>
                <p class="text-center text-xl text-red-700">You have no downlines as of the moment! Start recruiting now! </p>
        @else
      
            @foreach($coridors AS $cor)
                <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                <h2 id="accordion-color-heading-{{ $count }}">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-color-body-{{ $count }}" aria-expanded="true" aria-controls="accordion-color-body-{{ $count }}">
                    <span>Kuridor - {{ $cor->name }}</span>
                    <span class='text-xs text-green-400'>Remaining Wallet: {{ number_format($cor->curr_wallet,2) }} </span>
                    <span class='text-xs text-green-400'>Bets Today: {{ getBetsToday($cor->id) }}, Bets this Month: {{ getBetsMonth($cor->id) }}</span>
                    <span class='text-xs text-green-400'>Total Wins: {{ getTotalWins($cor->id) }}</span>
                    <a href="{{ route('viewtransaction', $cor->id) }}" target="_blank"><svg width="15px" height="15px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="check-lists-square" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <path id="primary" d="M7,9l1,1,2-2" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-2" data-name="primary" d="M7,15l1,1,2-2" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-3" data-name="primary" d="M17,9H14m3,6H14M20,3H4A1,1,0,0,0,3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4A1,1,0,0,0,20,3Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg></a>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h2>
                <div id="accordion-color-body-{{ $count }}" class="hidden" aria-labelledby="accordion-color-heading-{{ $count }}">
                    <div class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                        <table class="min-w-full leading-normal">
                            <thead>
                            
                                    @foreach(getPhakbets($cor->id) AS $ph)
                                    <tr>
                                        <th style='width:20px'></th>
                                        <th colspan='2' scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 bg-green-100 border-b border-gray-200">
                                            Phakbet - {{ $ph->name }}
                                        </th>
                                        <th scope="col" class="px-5 py-3 text-xs font-normal text-left text-gray-800 bg-green-100 border-b border-gray-200">Bets Today: {{ getBetsToday($ph->id) }}
                                            <br>Bets this Month: {{ getBetsMonth($ph->id) }}
                                        </th>
                                        <th scope="col" class="px-5 py-3 text-xs font-normal text-left text-gray-800 bg-green-100 border-b border-gray-200">
                                            Total Wins: {{ getTotalWins($ph->id) }}
                                        </th>
                                        <th scope="col" class="px-5 py-3 text-xs font-normal text-left text-gray-800 bg-green-100 border-b border-gray-200">
                                        <a href="{{ route('viewtransaction', $ph->id) }}" target="_blank"><svg width="15px" height="15px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="check-lists-square" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <path id="primary" d="M7,9l1,1,2-2" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-2" data-name="primary" d="M7,15l1,1,2-2" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-3" data-name="primary" d="M17,9H14m3,6H14M20,3H4A1,1,0,0,0,3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4A1,1,0,0,0,20,3Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg></a>
                                        </th>
                                    </tr>
                                    @endforeach
                            
                            </thead>
                            <tbody>
                            </tbody>
                            </table>
                    </div>
                </div>
            
                </div>
                @php $count++; @endphp
            @endforeach
        @endif
        </div>



        
    </main>
</x-app-layout>
<x-app-layout>


    <main class="relative h-screen overflow-hidden bg-gray-100 white:bg-gray-800">
    <x-sidebar />
    <x-header />

  

    <div class="h-screen px-4 pb-24 overflow-auto md:px-6">
               
                    <h1 class="text-4xl font-semibold text-gray-800 dark:text-white">
                       Choose Number Combination
                    </h1>
            

    <div class="container max-w-6xl px-6 mx-auto sm:px-9">
  
    <div class="p-6 mt-8">
        @if (session('status'))
                <br>
                    <div class="flex flex-wrap items-center gap-4">
                        <span class="px-4 py-2  text-base rounded-full text-red-600 bg-red-200 ">
                            {{ session('status') }}
                        </span>
                    </div>
                @endif

        
                <div class="flex flex-wrap" id="tabs-id">
  <div class="w-full">
    <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
        @for($x=0;$x<$tabs;$x++)
           @if($x==0) 
                @php $bg= "bg-blue-600"; 
                    $text = "text-white"; @endphp
           @else
                @php $bg="bg-white"; 
                $text = "text-blue-600"; @endphp
           @endif

           @php $between = explode("-",getBetween($x));
            $lessthan = $between[1]; @endphp

      @if($tabs > 1)
        <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
          <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal {{ $text }} {{ $bg }}" onclick="changeAtiveTab(event,'tab-{{ $x }}')">
            <i class="fas fa-space-shuttle text-base mr-1"></i>  Less than {{  $lessthan }}
          </a>
        </li>
      @endif
      @endfor
      
    </ul>
    <form method="POST" action="{{ route('place_bet_raffle') }}" onsubmit="return confirm('Are you sure you want to place bet?')">
    @csrf
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
          <div class="px-4 py-5 flex-auto">
            <div class="tab-content tab-space">
            @for($x=0;$x<$tabs;$x++)
              @if($x==0) 
                    @php $class= "block"; @endphp
              @else
                    @php $class="hidden"; @endphp
              @endif
              <div class="{{ $class }}" id="tab-{{ $x }}">
                <center>
                <p>
                <div class="flex-col rounded-md shadow-sm">
                  @foreach(getCombinations($eventid, $x) AS $val)
                      @if(checkRaffleAvail($val) == "1")
                      <button type="button" name="combi_choice" id="combi_choice" value="{{ $val }}" onclick="captureVal(this.value)" disabled class="py-3 px-4 inline-flex justify-center items-center gap-2 -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg border font-medium bg-gray-300  text-gray-700 align-middle hover:bg-gray-300 focus:z-10 focus:outline-none focus:ring-2 focus:bg-blue-400  transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400" style='width:120px'>
                      {{ $val }}
                        </button>
                       @else
                       <button type="button" name="combi_choice" id="combi_choice" value="{{ $val }}" onclick="captureVal(this.value)"  class="py-3 px-4 inline-flex justify-center items-center gap-2 -mt-px -ml-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-l-lg sm:mt-0 sm:first:ml-0 sm:first:rounded-tr-none sm:last:rounded-bl-none sm:last:rounded-r-lg border font-medium bg-white  text-gray-700 align-middle hover:bg-gray-300 focus:z-10 focus:outline-none focus:ring-2 focus:bg-blue-400  transition-all text-sm dark:bg-gray-800 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400" style='width:120px'>
                      {{ $val }}
                        </button>
                       @endif
                  @endforeach
                  </div>
                </p>
                </center>
              </div>
              @endfor

             
            </div>
            <br>
            <input type="hidden" name="choice" id="choice">
            <input type="hidden" name="event_id" id="event_id" value="{{ $eventid }}">
            <button type="submit" class="py-2 px-4  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                      Place Bet
               </button>
        </div>
          </div>
          
    </form>
  </div>
</div>

</div>


    </main>
    <script type="text/javascript">
  function changeAtiveTab(event,tabID){
    let element = event.target;
    
    while(element.nodeName !== "A"){
      element = element.parentNode;
    }
    ulElement = element.parentNode.parentNode;
    aElements = ulElement.querySelectorAll("li > a");
    tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
    for(let i = 0 ; i < aElements.length; i++){
      aElements[i].classList.remove("text-white");
      aElements[i].classList.remove("bg-blue-600");
      aElements[i].classList.add("text-blue-600");
      aElements[i].classList.add("bg-white");
      tabContents[i].classList.add("hidden");
      tabContents[i].classList.remove("block");
    }
    element.classList.remove("text-blue-600");
    element.classList.remove("bg-white");
    element.classList.add("text-white");
    element.classList.add("bg-blue-600");
    document.getElementById(tabID).classList.remove("hidden");
    document.getElementById(tabID).classList.add("block");
  }

  function captureVal(val){
    document.getElementById('choice').value= val;
  }
</script>

</x-app-layout>
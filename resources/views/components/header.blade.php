@php $usertype = auth()->user()->usertype; @endphp
<div class="flex flex-col w-full md:space-y-4">
            <header class="z-40 flex items-center justify-between w-full h-16">
                <div class="block ml-6 lg:hidden">
                    <!-- <button class="flex items-center p-2 text-gray-500 bg-white rounded-full shadow text-md">
                        <svg width="20" height="20" class="text-gray-400" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1664 1344v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45zm0-512v128q0 26-19 45t-45 19h-1408q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h1408q26 0 45 19t19 45z">
                            </path>
                        </svg>
                    </button>

                </div>
                <div class="relative z-20 flex flex-col justify-end h-full px-3 md:w-full">
                    <div class="relative flex items-center justify-end w-full p-1 space-x-4">
                       
                        <span class="w-1 h-8 bg-gray-200 rounded-lg">
                        </span>
                        <a href="#" class="relative block">
                            <img alt="profil" src="/images/1.jpg" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                        </a>
                        <button class="flex items-center text-gray-500 white:text-white text-md">
                            Charlie R
                            <svg width="20" height="20" class="ml-2 text-gray-400" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1408 704q0 26-19 45l-448 448q-19 19-45 19t-45-19l-448-448q-19-19-19-45t19-45 45-19h896q26 0 45 19t19 45z">
                                </path>
                            </svg>
                        </button>
                    </div> -->

            <nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
  <a href="#" class="flex items-center">
      <img src="https://phakbet.com/images/phaklogo.png" class="h-6 mr-3 sm:h-9" alt="PhakBet Logo">
      <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">PhakBet</span>
  </a>
  <div class="flex md:order-2">
      <!--<button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>-->
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
    @if($usertype=='Mayor' || $usertype=='Coridor')
                       <li> <a  href="{{ route('admin_dashboard') }}"  class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-purple-500 white:text-white" href="#">
                            <span class="text-left">
                            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="home-alt-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polygon id="secondary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: #2ca9bc; stroke-width: 2;"></polygon><polygon id="primary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polygon></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Home
                            </span>
                        </a></li>
                        @endif

                        @if($usertype=='King')
                        <li> <a  href="{{ route('dashboard') }}"  class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-purple-500 white:text-white" href="#">
                            <span class="text-left">
                            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="home-alt-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polygon id="secondary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: #2ca9bc; stroke-width: 2;"></polygon><polygon id="primary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polygon></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Home
                            </span>
                        </a></li>
                        @endif
                        @if($usertype=='Admin')
                        <li> <a  href="{{ route('mod_dashboard') }}"  class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-purple-500 white:text-white" href="#">
                            <span class="text-left">
                            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="home-alt-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polygon id="secondary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: #2ca9bc; stroke-width: 2;"></polygon><polygon id="primary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polygon></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Home
                            </span>
                        </a></li>

                        @endif

                        @if($usertype=='Phakbet')
                        <li><a  href="{{ route('dashboard_phakbet') }}"  class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-purple-500 white:text-white" href="#">
                            <span class="text-left">
                            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="home-alt-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polygon id="secondary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: #2ca9bc; stroke-width: 2;"></polygon><polygon id="primary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polygon></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Home
                            </span>
                        </a></li>
                        @endif

                        @if($usertype=='Liaison')
                        <li> <a  href="{{ route('liaison_dashboard') }}"  class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-purple-500 white:text-white" href="#">
                            <span class="text-left">
                            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="home-alt-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polygon id="secondary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: #2ca9bc; stroke-width: 2;"></polygon><polygon id="primary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polygon></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Home
                            </span>
                        </a></li>
                        @endif

                        @if($usertype=='Operator')
                        <li><a  href="{{ route('operator_dashboard') }}"  class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-purple-500 white:text-white" href="#">
                            <span class="text-left">
                            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="home-alt-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polygon id="secondary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: #2ca9bc; stroke-width: 2;"></polygon><polygon id="primary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polygon></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Home
                            </span>
                        </a></li>
                        @endif

                        
                        @if($usertype=='Accountant')
                       <li> <a  href="{{ route('accountant_dashboard') }}"  class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-purple-500 white:text-white" href="#">
                            <span class="text-left">
                            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="home-alt-2" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><polygon id="secondary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: #2ca9bc; stroke-width: 2;"></polygon><polygon id="primary" points="19 10 19 21 14 21 14 14 10 14 10 21 5 21 5 10 12 3 19 10" style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></polygon></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Home
                            </span>
                        </a></li>
                        @endif

                        <li><a href="{{ route('myprofile') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                            <span class="text-left">
                            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="contact-book" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="secondary" d="M22,13v2a1,1,0,0,1-1,1H19a1,1,0,0,1-1-1V13a1,1,0,0,1,1-1h2A1,1,0,0,1,22,13ZM21,6H19a1,1,0,0,0-1,1V9a1,1,0,0,0,1,1h2a1,1,0,0,0,1-1V7A1,1,0,0,0,21,6Z" style="fill: #2ca9bc;"></path><rect id="primary" x="2" y="2" width="18" height="20" rx="2" style="fill: #000000;"></rect><path id="secondary-2" data-name="secondary" d="M13.4,11.8A3,3,0,0,0,14,10a3,3,0,0,0-6,0,3,3,0,0,0,.6,1.8A4,4,0,0,0,7,15v1a1,1,0,0,0,1,1h6a1,1,0,0,0,1-1V15A4,4,0,0,0,13.4,11.8Z" style="fill: #2ca9bc;"></path></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Profile
                            </span>
                        </a> </li>

                        @if($usertype=='King' || $usertype=='Mayor')
                        <li><a href="{{ route('registermayor.index') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                            <span class="text-left">
                            
                            <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="list-square-2" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <line id="primary-upstroke" x1="0.1" transform="translate(16.45 8)" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></line> <line id="primary-upstroke-2" data-name="primary-upstroke" x1="0.1" transform="translate(16.45 12)" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></line> <line id="primary-upstroke-3" data-name="primary-upstroke" x1="0.1" transform="translate(16.45 16)" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></line> <path id="primary" d="M12,8H7m0,4h5M7,16h5M20,3H4A1,1,0,0,0,3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4A1,1,0,0,0,20,3Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Registration
                                <!-- <span class="w-4 h-2 p-1 ml-4 text-xs text-gray-400 bg-gray-200 rounded-lg">
                                    0
                                </span> -->
                            </span>
                        </a></li>
                        @endif
                        @if($usertype=='Coridor')
                        <li><a href="{{ route('phakbetlist') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                            <span class="text-left">
                            <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="list-square-2" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <line id="primary-upstroke" x1="0.1" transform="translate(16.45 8)" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></line> <line id="primary-upstroke-2" data-name="primary-upstroke" x1="0.1" transform="translate(16.45 12)" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></line> <line id="primary-upstroke-3" data-name="primary-upstroke" x1="0.1" transform="translate(16.45 16)" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></line> <path id="primary" d="M12,8H7m0,4h5M7,16h5M20,3H4A1,1,0,0,0,3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4A1,1,0,0,0,20,3Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Registration
                                <!-- <span class="w-4 h-2 p-1 ml-4 text-xs text-gray-400 bg-gray-200 rounded-lg">
                                    0
                                </span> -->
                            </span>
                        </a></li>
                        @endif
                        @if($usertype=='Admin')
                        <li><a href="{{ route('registerking') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                            <span class="text-left">
                            <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="list-square-2" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <line id="primary-upstroke" x1="0.1" transform="translate(16.45 8)" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></line> <line id="primary-upstroke-2" data-name="primary-upstroke" x1="0.1" transform="translate(16.45 12)" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></line> <line id="primary-upstroke-3" data-name="primary-upstroke" x1="0.1" transform="translate(16.45 16)" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></line> <path id="primary" d="M12,8H7m0,4h5M7,16h5M20,3H4A1,1,0,0,0,3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4A1,1,0,0,0,20,3Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Register King
                                <!-- <span class="w-4 h-2 p-1 ml-4 text-xs text-gray-400 bg-gray-200 rounded-lg">
                                    0
                                </span> -->
                            </span>
                        </a></li>
                        <li><a href="{{ route('event_bettors') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="add-user-square" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect id="primary" x="2" y="2" width="20" height="20" rx="2" style="fill: #000000;"></rect><path id="secondary" d="M16,20v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V20a6,6,0,0,1,2.89-5.12A5,5,0,0,1,10,6a4.38,4.38,0,0,1,1.27.17,1,1,0,0,1-.54,1.92A2.75,2.75,0,0,0,10,8a3,3,0,0,0,0,6,3,3,0,0,0,2.59-1.5,1,1,0,0,1,1.74,1,5.19,5.19,0,0,1-1.2,1.39A6,6,0,0,1,16,20ZM19,8H18V7a1,1,0,0,0-2,0V8H15a1,1,0,0,0,0,2h1v1a1,1,0,0,0,2,0V10h1a1,1,0,0,0,0-2Z" style="fill: #2ca9bc;"></path></g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                     Events Bettors
                                </span>
                            </a></li>
                        @endif
                        @if($usertype=='Mayor')
                        <li><a href="{{ route('mayor_heirarchy') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="heading-square" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <path id="primary" d="M8,7V17M16,7V17M9,7H7M9,17H7M15,7h2M15,17h2M8,12h8M3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4a1,1,0,0,0-1-1H4A1,1,0,0,0,3,4Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    Heirarchy
                                </span>
                            </a></li>
                        @endif 
                        @if($usertype=='Liaison')
                        <li><a href="{{ route('liaison_heirarchy') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="heading-square" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <path id="primary" d="M8,7V17M16,7V17M9,7H7M9,17H7M15,7h2M15,17h2M8,12h8M3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4a1,1,0,0,0-1-1H4A1,1,0,0,0,3,4Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    Heirarchy
                                </span>
                            </a></li>
                            <li><a href="{{ route('event_bettors') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="add-user-square" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect id="primary" x="2" y="2" width="20" height="20" rx="2" style="fill: #000000;"></rect><path id="secondary" d="M16,20v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V20a6,6,0,0,1,2.89-5.12A5,5,0,0,1,10,6a4.38,4.38,0,0,1,1.27.17,1,1,0,0,1-.54,1.92A2.75,2.75,0,0,0,10,8a3,3,0,0,0,0,6,3,3,0,0,0,2.59-1.5,1,1,0,0,1,1.74,1,5.19,5.19,0,0,1-1.2,1.39A6,6,0,0,1,16,20ZM19,8H18V7a1,1,0,0,0-2,0V8H15a1,1,0,0,0,0,2h1v1a1,1,0,0,0,2,0V10h1a1,1,0,0,0,0-2Z" style="fill: #2ca9bc;"></path></g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                     Events Bettors
                                </span>
                            </a></li>
                        @endif 
                        @if($usertype=='Operator')
                        <li><a href="{{ route('operator_heirarchy') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="heading-square" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <path id="primary" d="M8,7V17M16,7V17M9,7H7M9,17H7M15,7h2M15,17h2M8,12h8M3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4a1,1,0,0,0-1-1H4A1,1,0,0,0,3,4Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    Heirarchy
                                </span>
                            </a></li>
                            <li><a href="{{ route('event_bettors') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="add-user-square" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect id="primary" x="2" y="2" width="20" height="20" rx="2" style="fill: #000000;"></rect><path id="secondary" d="M16,20v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V20a6,6,0,0,1,2.89-5.12A5,5,0,0,1,10,6a4.38,4.38,0,0,1,1.27.17,1,1,0,0,1-.54,1.92A2.75,2.75,0,0,0,10,8a3,3,0,0,0,0,6,3,3,0,0,0,2.59-1.5,1,1,0,0,1,1.74,1,5.19,5.19,0,0,1-1.2,1.39A6,6,0,0,1,16,20ZM19,8H18V7a1,1,0,0,0-2,0V8H15a1,1,0,0,0,0,2h1v1a1,1,0,0,0,2,0V10h1a1,1,0,0,0,0-2Z" style="fill: #2ca9bc;"></path></g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                     Events Bettors
                                </span>
                            </a></li>
                        @endif 
                        @if($usertype=='King')
                        <li><a href="{{ route('events.index') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg width="20px" height="20px" viewBox="-2.03 0 20.065 20.065" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="pennant-10" transform="translate(-4 -2)"> <path id="secondary" fill="#2ca9bc" d="M6,3V20a1,1,0,0,0,1.32,1L12,19.39,16.68,21A1,1,0,0,0,18,20V3Zm7.24,11.75L12,14.15l-1.24.6L11,13.48l-1-.89,1.38-.19L12,11.25l.62,1.15,1.38.19-1,.89Z"></path> <path id="primary" d="M10,7h4m-2,4.25-.62,1.15L10,12.59l1,.89-.24,1.27,1.24-.6,1.24.6L13,13.48l1-.89-1.38-.19ZM5,3H19M6,20a1,1,0,0,0,1.32,1L12,19.39,16.68,21A1,1,0,0,0,18,20V3H6Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    My Events
                                </span>
                            </a></li>

                            <li> <a href="{{ route('event_bettors') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="add-user-square" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect id="primary" x="2" y="2" width="20" height="20" rx="2" style="fill: #000000;"></rect><path id="secondary" d="M16,20v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V20a6,6,0,0,1,2.89-5.12A5,5,0,0,1,10,6a4.38,4.38,0,0,1,1.27.17,1,1,0,0,1-.54,1.92A2.75,2.75,0,0,0,10,8a3,3,0,0,0,0,6,3,3,0,0,0,2.59-1.5,1,1,0,0,1,1.74,1,5.19,5.19,0,0,1-1.2,1.39A6,6,0,0,1,16,20ZM19,8H18V7a1,1,0,0,0-2,0V8H15a1,1,0,0,0,0,2h1v1a1,1,0,0,0,2,0V10h1a1,1,0,0,0,0-2Z" style="fill: #2ca9bc;"></path></g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                     Events Bettors
                                </span>
                            </a></li>

                            <li> <a href="{{ route('king_heirarchy') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="heading-square" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <path id="primary" d="M8,7V17M16,7V17M9,7H7M9,17H7M15,7h2M15,17h2M8,12h8M3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4a1,1,0,0,0-1-1H4A1,1,0,0,0,3,4Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    Heirarchy
                                </span>
                            </a></li>
                        @endif
                        @if($usertype=='Operator')
                        <li><a href="{{ route('user_wallets') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="bill-dollar" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="primary" d="M13,10a6,6,0,0,1,5-5.91V4a2,2,0,0,0-2-2H4A2,2,0,0,0,2,4V21a1,1,0,0,0,1.39.92l1.95-.83,1.94.83a1,1,0,0,0,.78,0L10,21.09l1.94.83a1,1,0,0,0,.78,0l1.94-.83,1.94.83A1,1,0,0,0,17,22a1,1,0,0,0,.55-.17A1,1,0,0,0,18,21V15.91A6,6,0,0,1,13,10Z" style="fill: #000000;"></path><path id="secondary" d="M22,11.5A2.5,2.5,0,0,1,20,14V14a1,1,0,0,1-2,0H17a1,1,0,0,1,0-2h2.5a.5.5,0,0,0,0-1h-1A2.5,2.5,0,0,1,18,6.05V6a1,1,0,0,1,2,0h1a1,1,0,0,1,0,2H18.5a.5.5,0,0,0,0,1h1A2.5,2.5,0,0,1,22,11.5ZM12,15a1,1,0,0,0-1-1H6a1,1,0,0,0,0,2h5A1,1,0,0,0,12,15Zm-2-4a1,1,0,0,0-1-1H6a1,1,0,0,0,0,2H9A1,1,0,0,0,10,11Z" style="fill: #2ca9bc;"></path></g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    User Wallets
                                </span>
                            </a></li>
                        @endif 
                        @if($usertype!='Accountant')
                        <li> <a href="{{ route('wallet_transfer') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" >
                            <span class="text-left">
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="debit-purchase-left" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect id="primary" x="2" y="4" width="20" height="16" rx="2" style="fill: #000000;"></rect><path id="secondary" d="M2,8H22v2H2Zm3,7.5A1.5,1.5,0,0,0,6.5,17a1.47,1.47,0,0,0,1-.41,1.51,1.51,0,0,0,1,.41,1.5,1.5,0,0,0,0-3,1.51,1.51,0,0,0-1,.41,1.47,1.47,0,0,0-1-.41A1.5,1.5,0,0,0,5,15.5Z" style="fill: #2ca9bc;"></path></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Wallet Transfer
                            </span>
                        </a></li>
                        @endif
                        @if($usertype == 'Admin')
                        <li> <a  href="{{ route('cashin') }}"  class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-purple-500 white:text-white">
                            <span class="text-left">
                            <svg fill="#000000" width="23px" height="23px" viewBox="0 0 24 24" id="curve-arrow-down-6" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="secondary" d="M19,22H15a1,1,0,0,1,0-2h4V4H5V9A1,1,0,0,1,3,9V4A2,2,0,0,1,5,2H19a2,2,0,0,1,2,2V20A2,2,0,0,1,19,22Z" style="fill: #2ca9bc;"></path><path id="primary" d="M17,6.69a1,1,0,0,0-1-.75c-5.67,0-9.3,2.62-9.9,7.06H4a1,1,0,0,0-.88.53,1,1,0,0,0,0,1L7.7,21.2a2,2,0,0,0,3.1,0l0-.06,4.48-6.58a1,1,0,0,0,.05-1A1,1,0,0,0,14.5,13H12.65A8.83,8.83,0,0,1,16.5,7.81,1,1,0,0,0,17,6.69Z" style="fill: #000000;"></path></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                              Cash In
                            </span>
                        </a></li>
                        @endif
                        @if($usertype=='Phakbet' || $usertype=='Coridor' || $usertype=='Mayor')
                        <li><a  href="{{ route('joinedevents') }}"  class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-purple-500 white:text-white">
                            <span class="text-left">
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="date-double-check" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="primary" d="M21,7H3A1,1,0,0,0,2,8V20a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V8A1,1,0,0,0,21,7Z" style="fill: #000000;"></path><path id="secondary" d="M22,6V9H2V6A2,2,0,0,1,4,4H20A2,2,0,0,1,22,6ZM9.71,17.71l4-4a1,1,0,0,0-1.42-1.42L9,15.59l-1.29-1.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,1.42,0Zm4,0,4-4a1,1,0,0,0-1.42-1.42l-4,4a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0Z" style="fill: #2ca9bc;"></path><path id="primary-2" data-name="primary" d="M16,7a1,1,0,0,1-1-1V3a1,1,0,0,1,2,0V6A1,1,0,0,1,16,7ZM9,6V3A1,1,0,0,0,7,3V6A1,1,0,0,0,9,6Z" style="fill: #000000;"></path></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Events Joined
                            </span>
                        </a></li>
                        @endif
                        @if($usertype!='Accountant')
                        <li><a href="{{ route('transactionhistory.index') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                            <span class="text-left">
                            <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="check-lists-square" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <path id="primary" d="M7,9l1,1,2-2" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-2" data-name="primary" d="M7,15l1,1,2-2" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-3" data-name="primary" d="M17,9H14m3,6H14M20,3H4A1,1,0,0,0,3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4A1,1,0,0,0,20,3Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Transaction History
                            </span>
                        </a></li>
                        @endif

                        @if($usertype == 'Admin' || $usertype == 'Operator' || $usertype == 'Accountant')
                        <li><a href="{{ route('all_transactions') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                            <span class="text-left">
                            <svg width="20px" height="20px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="check-lists-square" transform="translate(-2 -2)"> <rect id="secondary" fill="#2ca9bc" width="18" height="18" rx="1" transform="translate(3 3)"></rect> <path id="primary" d="M7,9l1,1,2-2" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-2" data-name="primary" d="M7,15l1,1,2-2" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> <path id="primary-3" data-name="primary" d="M17,9H14m3,6H14M20,3H4A1,1,0,0,0,3,4V20a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V4A1,1,0,0,0,20,3Z" fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path> </g> </g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                All Transactions
                            </span>
                        </a></li>
                        <li><a href="{{ route('events_summary') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="date-double-check" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="primary" d="M21,7H3A1,1,0,0,0,2,8V20a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V8A1,1,0,0,0,21,7Z" style="fill: #000000;"></path><path id="secondary" d="M22,6V9H2V6A2,2,0,0,1,4,4H20A2,2,0,0,1,22,6ZM9.71,17.71l4-4a1,1,0,0,0-1.42-1.42L9,15.59l-1.29-1.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,1.42,0Zm4,0,4-4a1,1,0,0,0-1.42-1.42l-4,4a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0Z" style="fill: #2ca9bc;"></path><path id="primary-2" data-name="primary" d="M16,7a1,1,0,0,1-1-1V3a1,1,0,0,1,2,0V6A1,1,0,0,1,16,7ZM9,6V3A1,1,0,0,0,7,3V6A1,1,0,0,0,9,6Z" style="fill: #000000;"></path></g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    Events Summary
                                </span>
                            </a></li>
                        
                            <li><a href="{{ route('user_summary') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="add-user-square" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect id="primary" x="2" y="2" width="20" height="20" rx="2" style="fill: #000000;"></rect><path id="secondary" d="M16,20v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V20a6,6,0,0,1,2.89-5.12A5,5,0,0,1,10,6a4.38,4.38,0,0,1,1.27.17,1,1,0,0,1-.54,1.92A2.75,2.75,0,0,0,10,8a3,3,0,0,0,0,6,3,3,0,0,0,2.59-1.5,1,1,0,0,1,1.74,1,5.19,5.19,0,0,1-1.2,1.39A6,6,0,0,1,16,20ZM19,8H18V7a1,1,0,0,0-2,0V8H15a1,1,0,0,0,0,2h1v1a1,1,0,0,0,2,0V10h1a1,1,0,0,0,0-2Z" style="fill: #2ca9bc;"></path></g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    User Summary
                                </span>
                            </a></li>
                        @endif
                        @if($usertype == 'Admin' || $usertype == 'Operator' || $usertype == 'Accountant' || $usertype=='King')
                        <li><a href="{{ route('event_winners') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="add-user-square" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect id="primary" x="2" y="2" width="20" height="20" rx="2" style="fill: #000000;"></rect><path id="secondary" d="M16,20v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V20a6,6,0,0,1,2.89-5.12A5,5,0,0,1,10,6a4.38,4.38,0,0,1,1.27.17,1,1,0,0,1-.54,1.92A2.75,2.75,0,0,0,10,8a3,3,0,0,0,0,6,3,3,0,0,0,2.59-1.5,1,1,0,0,1,1.74,1,5.19,5.19,0,0,1-1.2,1.39A6,6,0,0,1,16,20ZM19,8H18V7a1,1,0,0,0-2,0V8H15a1,1,0,0,0,0,2h1v1a1,1,0,0,0,2,0V10h1a1,1,0,0,0,0-2Z" style="fill: #2ca9bc;"></path></g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    Event Winners
                                </span>
                            </a></li>
                            <li><a href="{{ route('daily_bets') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                                <span class="text-left">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="date-double-check" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="primary" d="M21,7H3A1,1,0,0,0,2,8V20a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V8A1,1,0,0,0,21,7Z" style="fill: #000000;"></path><path id="secondary" d="M22,6V9H2V6A2,2,0,0,1,4,4H20A2,2,0,0,1,22,6ZM9.71,17.71l4-4a1,1,0,0,0-1.42-1.42L9,15.59l-1.29-1.3a1,1,0,0,0-1.42,1.42l2,2a1,1,0,0,0,1.42,0Zm4,0,4-4a1,1,0,0,0-1.42-1.42l-4,4a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0Z" style="fill: #2ca9bc;"></path><path id="primary-2" data-name="primary" d="M16,7a1,1,0,0,1-1-1V3a1,1,0,0,1,2,0V6A1,1,0,0,1,16,7ZM9,6V3A1,1,0,0,0,7,3V6A1,1,0,0,0,9,6Z" style="fill: #000000;"></path></g></svg>
                                </span>
                                <span class="mx-2 text-sm font-normal">
                                    Daily Bets
                                </span>
                            </a></li>
                        @endif
                        @if($usertype=='Admin' || $usertype=='King')
                        <li><a href="{{ route('custom_all') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                            <span class="text-left">
                            <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" id="agenda-pencil" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect id="primary" x="4" y="2" width="15" height="20" rx="2" style="fill: #000000;"></rect><path id="secondary" d="M5,17H3a1,1,0,0,1,0-2H5a1,1,0,0,1,0,2Zm0-4H3a1,1,0,0,1,0-2H5a1,1,0,0,1,0,2ZM5,9H3A1,1,0,0,1,3,7H5A1,1,0,0,1,5,9ZM18.91,5.3,12.3,11.91a1,1,0,0,0-.3.71V14a1,1,0,0,0,1,1h1.39a1,1,0,0,0,.71-.3L21.71,8.1a1,1,0,0,0,0-1.4l-1.4-1.4A1,1,0,0,0,18.91,5.3Z" style="fill: #2ca9bc;"></path></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Send Message
                            </span>
                        </a></li>
                        @endif
                        <li> <a href="{{ route('destroy') }}" class="flex items-center justify-start w-full p-2 pl-6 my-2 text-gray-400 transition-colors duration-200 border-l-4 border-transparent hover:text-gray-800" href="#">
                            <span class="text-left">
                            <svg fill="#000000" width="25px" height="25px" viewBox="0 0 24 24" id="lock" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path id="primary" d="M18,8H17V7A5,5,0,0,0,7,7V8H6a2,2,0,0,0-2,2V20a2,2,0,0,0,2,2H18a2,2,0,0,0,2-2V10A2,2,0,0,0,18,8ZM9,7a3,3,0,0,1,6,0V8H9Z" style="fill: #000000;"></path><path id="secondary" d="M12,12a2.5,2.5,0,0,0-1,4.79V18a1,1,0,0,0,2,0V16.79A2.5,2.5,0,0,0,12,12Z" style="fill: #2ca9bc;"></path></g></svg>
                            </span>
                            <span class="mx-2 text-sm font-normal">
                                Logout
                            </span>
                        </a></li>
    </ul>

  </div>
  </div>
</nav>
                </div>

             
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0FYEFYKGGN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0FYEFYKGGN');
</script>
            </header>
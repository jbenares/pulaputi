<x-app-layout>

<div class="relative h-screen overflow-hidden bg-white">
    <div class="h-full mx-auto max-w-7xl">
        <div class="relative z-10 h-full pb-8 bg-white sm:pb-16 md:pb-20 lg:w-full lg:pb-28 xl:pb-32">
            <div class="relative z-40 bg-white">
                <div class="px-4 mx-auto max-w-7xl sm:px-6">
                    <div class="flex items-center justify-between py-6 border-gray-100 md:space-x-10">
                        <div class="flex items-center justify-start gap-12">
                            <a class="flex items-center" href="/">
                                <img class="w-auto h-12 sm:h-12" src="/icons/rocket.svg" alt="site"/>
                                <span class="ml-2 text-2xl font-bold text-indigo-600">
                                    Tail-Kit
                                </span>
                            </a>
                            <nav class="hidden space-x-10 md:flex">
                                <div class="relative">
                                    <button type="button" class="inline-flex items-center text-base text-xl font-normal text-gray-800 bg-white rounded-md group hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <span>
                                            Components
                                        </span>
                                        <svg class="w-5 h-5 ml-2 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </nav>
                        </div>
                        <div class="-my-2 -mr-2 md:hidden">
                            <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                                <span class="sr-only">
                                    Open menu
                                </span>
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <main class="h-full px-4 mx-auto mt-10 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="flex flex-col items-start justify-between w-full h-full md:flex-row md:justify-start md:h-1/2">
                    <div class="z-20 flex flex-col items-center justify-start w-full h-full text-left md:z-30 md:w-1/2 md:items-start md:justify-center">
                        <h1 class="text-6xl font-extrabold tracking-tight text-gray-900 titleHome ">
                            <span class="flex w-full m-auto text-indigo-600">
                                Tail-kit
                            </span>
                            <span class="block font-bold xl:inline">
                                <span class="absolute">
                                    Components
                                </span>
                                <br/>
                                    for Tailwind CSS 3.0
                            </span>
                        </h1>
                        <h2 class="mt-3 text-lg text-gray-500 sm:mt-5 sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Tail-kit gives you access to over
                            <span class="font-bold text-gray-700">
                                200
                            </span>
                            fully coded and responsive components and templates, based on Tailwind CSS 3.0. It&#x27;s all free and open-source.
                        </h2>
                        <div class="w-full mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="{{ route('login') }}"  class="flex items-center justify-center w-full px-4 px-8 py-2 py-3 text-base font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700" href="/started">
                                    Login Admin
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a  href="{{ route('login_phakbet') }}"  target="_blank" rel="noreferrer" href="https://github.com/Charlie85270/tail-kit" class="flex items-center justify-center w-full px-4 px-8 py-2 py-3 text-base font-medium text-gray-800 bg-gray-100 rounded-md hover:bg-gray-200">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ml-2" viewBox="0 0 1792 1792">
                                        <path d="M896 128q209 0 385.5 103t279.5 279.5 103 385.5q0 251-146.5 451.5t-378.5 277.5q-27 5-40-7t-13-30q0-3 .5-76.5t.5-134.5q0-97-52-142 57-6 102.5-18t94-39 81-66.5 53-105 20.5-150.5q0-119-79-206 37-91-8-204-28-9-81 11t-92 44l-38 24q-93-26-192-26t-192 26q-16-11-42.5-27t-83.5-38.5-85-13.5q-45 113-8 204-79 87-79 206 0 85 20.5 150t52.5 105 80.5 67 94 39 102.5 18q-39 36-49 103-21 10-45 15t-57 5-65.5-21.5-55.5-62.5q-19-32-48.5-52t-49.5-24l-20-3q-21 0-29 4.5t-5 11.5 9 14 13 12l7 5q22 10 43.5 38t31.5 51l10 23q13 38 44 61.5t67 30 69.5 7 55.5-3.5l23-4q0 38 .5 88.5t.5 54.5q0 18-13 30t-40 7q-232-77-378.5-277.5t-146.5-451.5q0-209 103-385.5t279.5-279.5 385.5-103zm-477 1103q3-7-7-12-10-3-13 2-3 7 7 12 9 6 13-2zm31 34q7-5-2-16-10-9-16-3-7 5 2 16 10 10 16 3zm30 45q9-7 0-19-8-13-17-6-9 5 0 18t17 7zm42 42q8-8-4-19-12-12-20-3-9 8 4 19 12 12 20 3zm57 25q3-11-13-16-15-4-19 7t13 15q15 6 19-6zm63 5q0-13-17-11-16 0-16 11 0 13 17 11 16 0 16-11zm58-10q-2-11-18-9-16 3-14 15t18 8 14-14z">
                                        </path>
                                    </svg> -->
                                    <span class="ml-2">
                                        Login Phakbet
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="mt-4">
                            Need specific or new component ?
                            <span class="underline cursor-pointer">
                                Make a request
                            </span>
                        </div>
                    </div>
                    <div class="absolute z-10 w-full transform opacity-10 md:z-50 md:opacity-70 sm:text-center lg:text-left -right-10 -top-72 md:w-1/2">
                        <div class="flex gap-4 gap-y-1">
                            <div class="col-1">
                                <div class="mb-4">
                                    <div class="w-64 m-auto overflow-hidden shadow-lg rounded-2xl h-90">
                                        <img alt="eggs" src="/images/car/1.jpg" class="rounded-t-lg"/>
                                        <div class="relative w-full p-4 bg-white">
                                            <button aria-label="Go to article" type="button" class="absolute w-12 h-12 text-white bg-indigo-500 rounded-full right-8 -top-6">
                                                <svg width="20" height="20" fill="currentColor" class="w-6 h-6 mx-auto text-white" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M491 1536l91-91-235-235-91 91v107h128v128h107zm523-928q0-22-22-22-10 0-17 7l-542 542q-7 7-7 17 0 22 22 22 10 0 17-7l542-542q7-7 7-17zm-54-192l416 416-832 832h-416v-416zm683 96q0 53-37 90l-166 166-416-416 166-165q36-38 90-38 53 0 91 38l235 234q37 39 37 91z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <p class="mb-2 text-xl font-medium text-gray-800">
                                                Natural
                                            </p>
                                            <p class="text-xs text-gray-600">
                                                Dare to take the lead and never let yourself be overtaken by events.
                                            </p>
                                            <div class="flex flex-wrap items-center mt-6 justify-starts">
                                                <div class="text-xs mb-2 mr-2 py-1.5 px-4 text-gray-600 bg-purple-200 rounded-2xl">
                                                    #car
                                                </div>
                                                <div class="text-xs mb-2 mr-2 py-1.5 px-4 text-gray-600 bg-purple-200 rounded-2xl">
                                                    #auto
                                                </div>
                                                <div class="text-xs mb-2 py-1.5 px-4 text-gray-600 bg-purple-200 rounded-2xl">
                                                    #sport
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="relative w-64 p-4 overflow-hidden bg-white shadow-lg rounded-2xl">
                                        <img alt="moto" src="/images/object/1.png" class="absolute w-40 h-40 mb-4 -right-16 -bottom-16"/>
                                        <div class="w-4/6">
                                            <p class="mb-2 text-lg font-medium text-gray-800">
                                                Avg
                                            </p>
                                            <p class="text-xs text-gray-400">
                                                Detail is not an obsession, it is the very essence of perfection.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="w-64 p-4 m-auto bg-white shadow-lg rounded-2xl dark:bg-gray-800">
                                        <div class="w-full h-full text-center">
                                            <div class="flex flex-col justify-between h-full">
                                                <svg width="40" height="40" class="w-12 h-12 m-auto mt-4 text-indigo-500" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                                                    </path>
                                                </svg>
                                                <p class="mt-4 text-xl font-bold text-gray-800 dark:text-gray-200">
                                                    Remove card
                                                </p>
                                                <p class="px-6 py-2 text-xs text-gray-600 dark:text-gray-400">
                                                    Are you sure you want to delete this card ?
                                                </p>
                                                <div class="flex items-center justify-between w-full gap-4 mt-8">
                                                    <button type="button" class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                                        cancel
                                                    </button>
                                                    <button type="button" class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-red-600 rounded-lg shadow-md hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="flex flex-wrap items-center justify-center">
                                        <div class="relative flex-shrink-0 max-w-xs mx-2 mb-6 overflow-hidden bg-yellow-500 rounded-lg shadow-lg">
                                            <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none">
                                                <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="#f3c06b">
                                                </rect>
                                                <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="#f3c06b">
                                                </rect>
                                            </svg>
                                            <div class="relative flex items-center justify-center px-10 pt-10">
                                                <div class="absolute bottom-0 left-0 block w-48 h-48 ml-3 -mb-24">
                                                </div>
                                                <img class="relative w-40" src="/images/object/5.png" alt="shopping"/>
                                            </div>
                                            <div class="relative px-6 pb-6 mt-6 text-white">
                                                <span class="block -mb-1 opacity-75">
                                                    Indoor
                                                </span>
                                                <div class="flex justify-between">
                                                    <span class="block text-xl font-semibold">
                                                        Peace Lily
                                                    </span>
                                                    <span class="flex items-center px-3 py-2 text-xs font-bold leading-none text-yellow-500 bg-white rounded-full">
                                                        $36.00
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="w-64 p-4 bg-white shadow-lg rounded-2xl dark:bg-gray-800">
                                        <p class="text-3xl font-bold text-black dark:text-white">
                                            Essential
                                        </p>
                                        <p class="mb-4 text-sm text-gray-500 dark:text-gray-300">
                                            For the basics
                                        </p>
                                        <p class="text-3xl font-bold text-black dark:text-white">
                                            $99
                                        </p>
                                        <p class="mb-4 text-sm text-gray-500 dark:text-gray-300">
                                            Per agent per month
                                        </p>
                                        <button type="button" class="w-56 px-3 py-3 m-auto text-sm text-black bg-white border border-black rounded-lg shadow hover:bg-black hover:text-white dark:hover-text-gray-900 dark:hover:bg-gray-100 ">
                                            Request demo
                                        </button>
                                        <ul class="w-full mt-6 mb-6 text-sm text-black dark:text-white">
                                            <li class="flex items-center mb-3">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 1792 1792">
                                                    <path d="M1152 896q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181zm-256-544q-148 0-273 73t-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273-73-273-198-198-273-73zm768 544q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                All illimited link
                                            </li>
                                            <li class="flex items-center mb-3">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 1792 1792">
                                                    <path d="M1152 896q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181zm-256-544q-148 0-273 73t-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273-73-273-198-198-273-73zm768 544q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Own analitycs plateform link
                                            </li>
                                            <li class="flex items-center mb-3">
                                                <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 1792 1792">
                                                    <path d="M1152 896q0 106-75 181t-181 75-181-75-75-181 75-181 181-75 181 75 75 181zm-256-544q-148 0-273 73t-198 198-73 273 73 273 198 198 273 73 273-73 198-198 73-273-73-273-198-198-273-73zm768 544q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                24/24 support link
                                            </li>
                                        </ul>
                                        <span class="block w-56 h-1 my-2 bg-gray-100 rounded-lg">
                                        </span>
                                        <ul class="w-full mt-6 mb-6 text-sm text-black dark:text-white">
                                            <li class="flex items-center mb-3 space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1600 736v192q0 40-28 68t-68 28h-416v416q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-416h-416q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h416v-416q0-40 28-68t68-28h192q40 0 68 28t28 68v416h416q40 0 68 28t28 68z">
                                                    </path>
                                                </svg>
                                                <div>
                                                    All illimited link
                                                    <a href="#" class="font-semibold text-red-500">
                                                        free plan
                                                    </a>
                                                </div>
                                            </li>
                                            <li class="flex items-center mb-3 space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1600 736v192q0 40-28 68t-68 28h-416v416q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-416h-416q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h416v-416q0-40 28-68t68-28h192q40 0 68 28t28 68v416h416q40 0 68 28t28 68z">
                                                    </path>
                                                </svg>
                                                <div>
                                                    Best ranking
                                                </div>
                                            </li>
                                            <li class="flex items-center mb-3 space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1600 736v192q0 40-28 68t-68 28h-416v416q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-416h-416q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h416v-416q0-40 28-68t68-28h192q40 0 68 28t28 68v416h416q40 0 68 28t28 68z">
                                                    </path>
                                                </svg>
                                                <div>
                                                    Chocolate and meel
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="flex gap-4 mb-4">
                                    <button type="button" class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-red-600 rounded-lg shadow-md hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                        Annuler
                                    </button>
                                    <button type="button" class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-green-500 rounded-lg shadow-md hover:bg-green-700 focus:ring-green-500 focus:ring-offset-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                        Confirmer
                                    </button>
                                </div>
                                <div class="mb-4">
                                    <div class="w-64 bg-white shadow-lg rounded-2xl dark:bg-gray-800">
                                        <img alt="profil" src="/images/landscape/1.jpg" class="w-full mb-4 rounded-t-lg h-28"/>
                                        <div class="flex flex-col items-center justify-center p-4 -mt-16">
                                            <a href="#" class="relative block">
                                                <img alt="profil" src="/images/person/1.jpg" class="w-16 h-16 mx-auto rounded-full "/>
                                            </a>
                                            <p class="mt-2 text-xl font-medium text-gray-800 dark:text-white">
                                                Charlie
                                            </p>
                                            <p class="flex items-center text-xs text-gray-400">
                                                <svg width="10" height="10" fill="currentColor" class="w-4 h-4 mr-2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M491 1536l91-91-235-235-91 91v107h128v128h107zm523-928q0-22-22-22-10 0-17 7l-542 542q-7 7-7 17 0 22 22 22 10 0 17-7l542-542q7-7 7-17zm-54-192l416 416-832 832h-416v-416zm683 96q0 53-37 90l-166 166-416-416 166-165q36-38 90-38 53 0 91 38l235 234q37 39 37 91z">
                                                    </path>
                                                </svg>
                                                Nantes
                                            </p>
                                            <p class="text-xs text-gray-400">
                                                FullStack dev
                                            </p>
                                            <div class="flex items-center justify-between w-full gap-4 mt-8">
                                                <button type="button" class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                                    See profile
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="flex items-center justify-between w-64 p-4 bg-white shadow-lg rounded-2xl">
                                        <div class="w-2/6">
                                            <img src="/images/person/2.jpeg" alt="person" class="w-12 h-12 rounded-full"/>
                                        </div>
                                        <div class="w-3/6">
                                            <p class="text-sm text-gray-500">
                                                You have
                                                <span class="font-bold text-indigo-500">
                                                    2
                                                </span>
                                                new messages
                                            </p>
                                        </div>
                                        <div class="w-1/6 text-right">
                                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792" class="w-6 h-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1792 710v794q0 66-47 113t-113 47h-1472q-66 0-113-47t-47-113v-794q44 49 101 87 362 246 497 345 57 42 92.5 65.5t94.5 48 110 24.5h2q51 0 110-24.5t94.5-48 92.5-65.5q170-123 498-345 57-39 100-87zm0-294q0 79-49 151t-122 123q-376 261-468 325-10 7-42.5 30.5t-54 38-52 32.5-57.5 27-50 9h-2q-23 0-50-9t-57.5-27-52-32.5-54-38-42.5-30.5q-91-64-262-182.5t-205-142.5q-62-42-117-115.5t-55-136.5q0-78 41.5-130t118.5-52h1472q65 0 112.5 47t47.5 113z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="relative w-64 p-4 m-auto bg-gray-900 shadow-lg rounded-2xl">
                                        <div class="w-full h-full text-center">
                                            <div class="flex flex-col justify-between h-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="w-20 h-20 m-auto mt-4 text-white dark:text-white" viewBox="0 0 2048 1792">
                                                    <path d="M1920 768q53 0 90.5 37.5t37.5 90.5-37.5 90.5-90.5 37.5h-15l-115 662q-8 46-44 76t-82 30h-1280q-46 0-82-30t-44-76l-115-662h-15q-53 0-90.5-37.5t-37.5-90.5 37.5-90.5 90.5-37.5h1792zm-1435 800q26-2 43.5-22.5t15.5-46.5l-32-416q-2-26-22.5-43.5t-46.5-15.5-43.5 22.5-15.5 46.5l32 416q2 25 20.5 42t43.5 17h5zm411-64v-416q0-26-19-45t-45-19-45 19-19 45v416q0 26 19 45t45 19 45-19 19-45zm384 0v-416q0-26-19-45t-45-19-45 19-19 45v416q0 26 19 45t45 19 45-19 19-45zm352 5l32-416q2-26-15.5-46.5t-43.5-22.5-46.5 15.5-22.5 43.5l-32 416q-2 26 15.5 46.5t43.5 22.5h5q25 0 43.5-17t20.5-42zm-1156-1217l-93 412h-132l101-441q19-88 89-143.5t160-55.5h167q0-26 19-45t45-19h384q26 0 45 19t19 45h167q90 0 160 55.5t89 143.5l101 441h-132l-93-412q-11-44-45.5-72t-79.5-28h-167q0 26-19 45t-45 19h-384q-26 0-45-19t-19-45h-167q-45 0-79.5 28t-45.5 72z">
                                                    </path>
                                                </svg>
                                                <p class="absolute text-sm italic text-white top-2 right-2">
                                                    by express
                                                </p>
                                                <p class="mt-4 text-lg text-white">
                                                    Package delivered
                                                </p>
                                                <p class="px-6 py-2 text-xs font-thin text-gray-50">
                                                    Your package was delivered in 1 day and 4 hours by our postal partner
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="w-64">
                                        <div class="relative mt-1">
                                            <button type="button" class="relative w-full py-3 pl-3 pr-10 text-left bg-white rounded-md shadow-lg cursor-default focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <span class="flex items-center">
                                                    <img src="/images/person/2.jpeg" alt="person" class="flex-shrink-0 w-6 h-6 rounded-full"/>
                                                    <span class="block ml-3 truncate">
                                                        John Jackson
                                                    </span>
                                                </span>
                                                <span class="absolute inset-y-0 right-0 flex items-center pr-2 ml-3 pointer-events-none">
                                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="w-64 p-4 bg-white shadow-lg rounded-2xl dark:bg-gray-800">
                                        <p class="mb-4 text-xl font-medium text-gray-800 dark:text-gray-50">
                                            Entreprise
                                        </p>
                                        <p class="text-3xl font-bold text-gray-900 dark:text-white">
                                            $199
                                            <span class="text-sm text-gray-300">
                                                / month
                                            </span>
                                        </p>
                                        <p class="mt-4 text-xs text-gray-600 dark:text-gray-100">
                                            For most businesses that want to optimize web queries.
                                        </p>
                                        <ul class="w-full mt-6 mb-6 text-sm text-gray-600 dark:text-gray-100">
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                All illimited link
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Own analitycs plateform link
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                24/24 support link
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Unlimited user
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="#10b981" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Best ranking
                                            </li>
                                            <li class="flex items-center mb-3 opacity-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="w-6 h-6 mr-2" fill="red" viewBox="0 0 1792 1792">
                                                    <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Prenium svg
                                            </li>
                                            <li class="flex items-center mb-3 opacity-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="w-6 h-6 mr-2" fill="red" viewBox="0 0 1792 1792">
                                                    <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                My wife
                                            </li>
                                        </ul>
                                        <button type="button" class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                            Choose plan
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="mb-4">
                                    <div class="w-64 p-4 bg-indigo-500 shadow-lg rounded-2xl dark:bg-gray-800">
                                        <div class="flex items-center justify-between text-white">
                                            <p class="mb-4 text-4xl font-medium">
                                                Pro
                                            </p>
                                            <p class="flex flex-col text-3xl font-bold">
                                                $99
                                                <span class="text-sm font-thin text-right">
                                                    month
                                                </span>
                                            </p>
                                        </div>
                                        <p class="mt-4 text-white text-md">
                                            Plan include :
                                        </p>
                                        <ul class="w-full mt-6 mb-6 text-sm text-white">
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                All illimited link
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Own analitycs plateform link
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                24/24 support link
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Unlimited user
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Best ranking
                                            </li>
                                            <li class="flex items-center mb-3 opacity-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="w-6 h-6 mr-2" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Prenium svg
                                            </li>
                                            <li class="flex items-center mb-3 opacity-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="w-6 h-6 mr-2" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                My wife
                                            </li>
                                        </ul>
                                        <button type="button" class="w-full px-3 py-3 text-sm text-indigo-500 bg-white rounded-lg shadow hover:bg-gray-100 ">
                                            Choose plan
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="p-4 bg-white shadow-lg rounded-2xl w-36 dark:bg-gray-800">
                                        <div class="flex items-center">
                                            <span class="relative w-4 h-4 p-2 bg-green-500 rounded-full">
                                                <svg width="20" fill="currentColor" height="20" class="absolute h-2 text-white transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1362 1185q0 153-99.5 263.5t-258.5 136.5v175q0 14-9 23t-23 9h-135q-13 0-22.5-9.5t-9.5-22.5v-175q-66-9-127.5-31t-101.5-44.5-74-48-46.5-37.5-17.5-18q-17-21-2-41l103-135q7-10 23-12 15-2 24 9l2 2q113 99 243 125 37 8 74 8 81 0 142.5-43t61.5-122q0-28-15-53t-33.5-42-58.5-37.5-66-32-80-32.5q-39-16-61.5-25t-61.5-26.5-62.5-31-56.5-35.5-53.5-42.5-43.5-49-35.5-58-21-66.5-8.5-78q0-138 98-242t255-134v-180q0-13 9.5-22.5t22.5-9.5h135q14 0 23 9t9 23v176q57 6 110.5 23t87 33.5 63.5 37.5 39 29 15 14q17 18 5 38l-81 146q-8 15-23 16-14 3-27-7-3-3-14.5-12t-39-26.5-58.5-32-74.5-26-85.5-11.5q-95 0-155 43t-60 111q0 26 8.5 48t29.5 41.5 39.5 33 56 31 60.5 27 70 27.5q53 20 81 31.5t76 35 75.5 42.5 62 50 53 63.5 31.5 76.5 13 94z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <p class="ml-2 text-gray-700 text-md dark:text-gray-50">
                                                Sales
                                            </p>
                                        </div>
                                        <div class="flex flex-col justify-start">
                                            <p class="my-4 text-4xl font-bold text-left text-gray-800 dark:text-white">
                                                36K
                                            </p>
                                            <div class="relative h-2 bg-gray-200 rounded w-28">
                                                <div class="absolute top-0 left-0 w-2/3 h-2 bg-green-500 rounded">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="w-full max-w-xl px-5 py-4 mx-auto text-gray-800 bg-white rounded-lg shadow-lg dark:bg-gray-800 dark:text-gray-50">
                                        <div class="w-full pt-1 mx-auto -mt-16 text-center">
                                            <a href="#" class="relative block">
                                                <img alt="profil" src="/images/person/1.jpg" class="w-20 h-20 mx-auto rounded-full "/>
                                            </a>
                                        </div>
                                        <div class="w-full">
                                            <div class="mb-6 text-center">
                                                <p class="text-xl font-medium text-gray-800 dark:text-white">
                                                    John Jackson
                                                </p>
                                                <p class="text-xs text-gray-400">
                                                    FullStack dev
                                                </p>
                                            </div>
                                            <div class="w-full p-2 mb-4 bg-pink-100 rounded-lg dark:bg-white">
                                                <div class="flex items-center justify-between text-xs text-gray-400 dark:text-black">
                                                    <p class="flex flex-col">
                                                        Art.
                                                        <span class="font-bold text-black dark:text-indigo-500">
                                                            34
                                                        </span>
                                                    </p>
                                                    <p class="flex flex-col">
                                                        Foll.
                                                        <span class="font-bold text-black dark:text-indigo-500">
                                                            455
                                                        </span>
                                                    </p>
                                                    <p class="flex flex-col">
                                                        Rat.
                                                        <span class="font-bold text-black dark:text-indigo-500">
                                                            9.3
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <button type="button" class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                                Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="p-6 bg-white rounded-lg shadow-md w-72">
                                        <div class="relative w-16 mx-auto mb-3 -mt-10">
                                            <img class="-mt-1" src="/icons/cookie.svg" alt="cookie"/>
                                        </div>
                                        <span class="block w-full mb-3 leading-normal text-gray-800 sm:w-48 text-md">
                                            We care about your data, and we&#x27;d love to use cookies to make your experience better.
                                        </span>
                                        <div class="flex items-center justify-between">
                                            <a class="mr-1 text-xs text-gray-400 hover:text-gray-800" href="#">
                                                Privacy Policy
                                            </a>
                                            <div class="w-1/2">
                                                <button type="button" class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                                    See more
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="w-64 p-4 bg-indigo-500 shadow-lg rounded-2xl dark:bg-gray-800">
                                        <div class="flex items-center justify-between text-white">
                                            <p class="mb-4 text-4xl font-medium">
                                                Pro
                                            </p>
                                            <p class="flex flex-col text-3xl font-bold">
                                                $99
                                                <span class="text-sm font-thin text-right">
                                                    month
                                                </span>
                                            </p>
                                        </div>
                                        <p class="mt-4 text-white text-md">
                                            Plan include :
                                        </p>
                                        <ul class="w-full mt-6 mb-6 text-sm text-white">
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                All illimited link
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Own analitycs plateform link
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                24/24 support link
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Unlimited user
                                            </li>
                                            <li class="flex items-center mb-3 ">
                                                <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="6" height="6" stroke="currentColor" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Best ranking
                                            </li>
                                            <li class="flex items-center mb-3 opacity-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="w-6 h-6 mr-2" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                Prenium svg
                                            </li>
                                            <li class="flex items-center mb-3 opacity-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" class="w-6 h-6 mr-2" fill="white" viewBox="0 0 1792 1792">
                                                    <path d="M1277 1122q0-26-19-45l-181-181 181-181q19-19 19-45 0-27-19-46l-90-90q-19-19-46-19-26 0-45 19l-181 181-181-181q-19-19-45-19-27 0-46 19l-90 90q-19 19-19 46 0 26 19 45l181 181-181 181q-19 19-19 45 0 27 19 46l90 90q19 19 46 19 26 0 45-19l181-181 181 181q19 19 45 19 27 0 46-19l90-90q19-19 19-46zm387-226q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                                    </path>
                                                </svg>
                                                My wife
                                            </li>
                                        </ul>
                                        <button type="button" class="w-full px-3 py-3 text-sm text-indigo-500 bg-white rounded-lg shadow hover:bg-gray-100 ">
                                            Choose plan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
</x-app-layout>
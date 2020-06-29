<header class="flex justify-between items-center py-4 px-6 bg-white border-b-4 border-green-600">
  <div class="flex items-center">
      <button x-on:click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
          <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
      </button>

      <div class="relative mx-4 lg:mx-0">
  <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
      <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
          <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
  </span>
            <admin-search></admin-search>
      </div>
  </div>

  <div class="flex items-center">
      {{-- <button class="flex mx-4 text-gray-600 focus:outline-none">
         
        <span>&#8369;</span>
          99.99
      </button> --}}

      <div x-data="{ dropdownOpen: false }"  class="relative">
       
          <p x-on:click="dropdownOpen = !dropdownOpen" class="cursor-pointer text-gray-700 text-base font-medium">
              <auth-user name="{{Auth::user()->name}}" id="{{Auth::user()->id}}" />  
          </p>
          <div x-show="dropdownOpen" x-on:click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

          <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
              <a  href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" 
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">Logout</a>
          </div>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>

      </div>
  </div>
</header>
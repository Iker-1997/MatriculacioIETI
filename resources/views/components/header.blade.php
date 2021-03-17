<header class="w-full bg-admin text-white py-4 flex justify-between">
     <a href="/admin/dashboard" class="mx-3 bg-mtr-dark p-2 w-1/12 text-center font-mono rounded-sm min-w-max">HOME</a>
     <div class="flex justify-center items-center space-x-2">
          <span class="text-sm text-red-500 dark:text-gray-400">Light</span>
          <div>
               <input type="checkbox" name="" id="toogle" class="hidden" />
               <label for="toogle">
                    <div class="w-9 h-5 flex items-center bg-gray-300 rounded-full p-1">
                         <div class="toogle-dot w-4 h-4 bg-white rounded-full shadow-md transform duration-300 ease-in-out"></div>
                    </div>
               </label>
          </div>
          <span class="text-sm text-gray-400 dark:text-red-500">Dark</span>
     </div>
     <div class="p-2 w-1/12 text-center">
          <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg" width="25" class="m-0" viewBox="0 0 512 512"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg>
          </a>
     </div>
</header>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     {{ csrf_field() }}
</form>
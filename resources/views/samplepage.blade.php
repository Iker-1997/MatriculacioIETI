<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/breadcrumbs.css') }}">

        <title>Matriculació IETI</title>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-base min-w-max">
        <div class="container bg-blue-200 text-center rounded-xl p-8 shadow-xl">
            <h1 class="text-4xl md:text-6xl font-bold md:font-semibold text-user">Sample page</h1>
            <h2 class="mb-4 text-4xl">Headers</h2>
            <header class="w-full bg-admin text-white py-4 flex justify-between">
                <a href="/admin/dashboard" class="mx-3 bg-mtr-dark p-2 w-1/12 text-center font-mono rounded-sm min-w-max">HOME</a>
                    <div class="p-2 w-1/12 text-center">
                        <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg" width="25" class="m-0" viewBox="0 0 512 512"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg>
                        </a>
                    </div>
            </header>
            <p class="my-8">This is a test page filled with common HTML elements. </p>
            <ul>
                <li><a href="http://www.iesesteveterradas.cat/">This is a text link</a>.</li>
                <li><strong>Strong is used to indicate strong importance.</strong></li>
                <li><em>This text has added emphasis.</em></li>
	            <li>The <b>b element</b> is stylistically different text from normal text, without any special importance.</li>
	            <li>The <i>i element</i> is text that is offset from the normal text.</li>
	            <li>The <u>u element</u> is text with an unarticulated, though explicitly rendered, non-textual annotation.</li>
	            <li><del>This text is deleted</del> and <ins>This text is inserted</ins>.</li>
            </ul>
            <p>This is a second list:</p>
            <ol>
	            <li><s>This text has a strikethrough</s>.</li>
	            <li><small>This small text is small for for fine print, etc.</small></li>
	            <li>Abbreviation: <abbr title="HyperText Markup Language">HTML</abbr></li>
	            <li><q cite="https://developer.mozilla.org/en-US/docs/HTML/Element/q">This text is a short inline quotation.</q></li>
	            <li><cite>This is a citation.</cite></li>
	            <li>The <dfn>dfn element</dfn> indicates a definition.</li>
	            <li>The <mark>mark element</mark> indicates a highlight.</li>
	            <li>The <var>variable element</var>, such as <var>x</var> = <var>y</var>.</li>
	            <li>The time element: <time datetime="2013-04-06T12:32+00:00">2 weeks ago</time></li>
            </ol>
            <h2 class="mb-4 text-4xl">Forms</h2>
            <!-- component -->
            <div class="bg-white shadow rounded-lg p-6">        
                <div class="grid lg:grid-cols-2 gap-6">
                    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                            <p>
                            </p>
                        </div>
                    <p>
                    <input id="name" autocomplete="false" tabindex="0" type="text" value="start" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                    </p>
                    </div>
                    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p>
                        </p>
                    </div>
                    <p>
                    <input id="lastname" autocomplete="false" tabindex="0" type="text"  value="end" class="py-1 px-1 outline-none block h-full w-full">
                    </p>
                    </div>
                    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                            <p>
                            </p>
                        </div>
                        <p>
                        <input id="username" autocomplete="false" tabindex="0" type="text"  value="name" class="py-1 px-1 outline-none block h-full w-full">
                        </p>
                    </div>
                    <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                            <p>
                            </p>
                        </div>
                        <p>
                        <input id="password" autocomplete="false" tabindex="0" type="text"  value="description" class="py-1 px-1 outline-none block h-full w-full">
                        </p>
                    </div>
                </div>
                <div class="border-t mt-6 pt-3">
                    <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                    Save
                    </button>
                </div>
            </div>
<table class="w-full border-2 border-mtr-dark table-auto">
	<caption class="mb-4 text-4xl">Tables</caption>
	<thead>
	<tr>
        <th class="border-2 border-mtr-dark">NAME</th>
        <th class="border-2 border-mtr-dark">EMAIl</th>
        <th class="border-2 border-mtr-dark">Role</th>
	</tr>
	</thead>
	<tbody>
	<tr class="text-center">
        <td class="border-2 border-mtr-dark">adrian</td>
        <td class="border-2 border-mtr-dark">adrian@gmail.com</td>
        <td class="border-2 border-mtr-dark">admin</td>
	</tr>
	<tr class="text-center">
		<td class="border-2 border-mtr-dark">Jesus</td>
		<td class="border-2 border-mtr-dark">jesus@xtec.cat</td>
		<td class="border-2 border-mtr-dark">admin</td>
	</tr>
	<tr class="text-center">
		<td class="border-2 border-mtr-dark">Iker</td>
		<td class="border-2 border-mtr-dark">iker@xtec.cat</td>
		<td class="border-2 border-mtr-dark">admin</td>
	</tr>
	</tbody>
</table>
<h2 class="mb-4 text-4xl">Footer</h2>
<footer class="w-full bg-admin text-white py-2 text-center bottom-0">
     2021 - {{ now()->year }}. Adrian Pradas - Jesus Serrano - Iker Cayero
</footer>   
</div>
</div>    
    </body>
</html>
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
        <style>
            body{
                background-color:#3A81F5;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-base min-w-max">
        <div class="container bg-admin text-center rounded-xl p-8 shadow-xl">
            <h1 class="text-4xl md:text-6xl font-bold md:font-semibold text-user">Sample page</h1>
            <p class="my-8 text-base">This is a test page filled with common HTML elements. </p>
            <ul>
                <li class="text-base"><a href="http://www.iesesteveterradas.cat/">This is a text link</a>.</li>
                <li class="text-base"><strong>Strong is used to indicate strong importance.</strong></li>
                <li class="text-base"><em>This text has added emphasis.</em></li>
	            <li class="text-base">The <b>b element</b> is stylistically different text from normal text, without any special importance.</li>
	            <li class="text-base">The <i>i element</i> is text that is offset from the normal text.</li>
	            <li class="text-base">The <u>u element</u> is text with an unarticulated, though explicitly rendered, non-textual annotation.</li>
	            <li class="text-base"><del>This text is deleted</del> and <ins>This text is inserted</ins>.</li>
            </ul>
            <p>This is a second list:</p>
            <ol>
	            <li class="text-base"><s>This text has a strikethrough</s>.</li>
	            <li class="text-base"><small>This small text is small for for fine print, etc.</small></li>
	            <li class="text-base">Abbreviation: <abbr title="HyperText Markup Language">HTML</abbr></li>
	            <li class="text-base"><q cite="https://developer.mozilla.org/en-US/docs/HTML/Element/q">This text is a short inline quotation.</q></li>
	            <li class="text-base"><cite>This is a citation.</cite></li>
	            <li class="text-base">The <dfn>dfn element</dfn> indicates a definition.</li>
	            <li class="text-base">The <mark>mark element</mark> indicates a highlight.</li>
	            <li class="text-base">The <var>variable element</var>, such as <var>x</var> = <var>y</var>.</li>
	            <li class="text-base">The time element: <time datetime="2013-04-06T12:32+00:00">2 weeks ago</time></li>
            </ol>
            <h2 class="text-base">Sample Form</h2>  
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
<h3>Super Important data</h3>
<table class="w-full border-2 border-mtr-dark table-auto">
	<caption class="mb-4 text-4xl">The dark side teachers</caption>
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

<footer class="w-full bg-admin text-white py-2 text-center bottom-0">
     2021 - {{ now()->year }}. Adrian Pradas - Jesus Serrano - Iker Cayero
</footer>   
</div>
</div>    
    </body>
</html>
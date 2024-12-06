@php
    use Carbon\Carbon;

function convertDate($date) {
    $baseDate = Carbon::create(1899, 12, 30); // Base date Excel (1 Januari 1900 minus 2 hari karena offset)
    $convertedDate = $baseDate->addDays(floor($date))
                              ->addSeconds(($date - floor($date)) * 86400)
                              ->format('Y-m-d H:i:s');

    return $convertedDate;
}

function durationConvert($waktuSaatIni, $timeDown) {
    $timeNow = Carbon::parse(convertDate($waktuSaatIni));
    $timeDownParsed = Carbon::parse(convertDate($timeDown));

    $diff = $timeNow->diff($timeDownParsed); // Menghitung selisih waktu

    return "{$diff->h} Jam {$diff->i} Menit";
}
@endphp

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
      <style>
        #dropdown-menu.hidden { display: none; }
        #dropdown-menu.visible { display: block; }
    </style>
</head>
<body>
    <nav class="bg-red-600 bg-red-600 dark:bg-red-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Diouma</span>
        </a>
        <div class="flex md:order-2">
        <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 mr-1" >
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
        <span class="sr-only">Search</span>
        </button>
        <div class="relative hidden md:block">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg>
            </div>
        </div>
        <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
        <div class="relative mt-3 md:hidden">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
            </div>
            <input type="text" id="search-navbar" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
        </div>
        <ul
            class="flex flex-col p-4 md:p-0 mt-4 font-medium border  md:flex-row md:space-x-8 md:mt-0 md:border-0 ">
            <li>
            <a href="#"
                class="block py-2 pl-3 pr-4 text-white bg-black rounded md:bg-transparent md:text-blabg-black md:p-0 md:dark:text-black"
                aria-current="page">Home</a>
            </li>
            <li>
            <a href="#"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-black md:p-0 md:dark:hover:text-black dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
            </li>
            <li>
            <a href="#"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-black md:p-0 dark:text-white md:dark:hover:text-black dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- component -->
    <div class="max-w-[1420px] mx-auto">
        <br>
        <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
            <div class=""></div>
            <div class="ml-3">
                <div class="w-full max-w-sm min-w-[200px] relative flex items-center">
                    <!-- Input Search -->
                    <input
                        class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                        placeholder="Search for invoice..."
                    />
                    <!-- Button Search -->

                    </button>
                    <div class="relative inline-block text-left pl-2">
                        <div>
                            <button
                                type="button"
                                class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                id="menu-button"
                                aria-expanded="false"
                                aria-haspopup="true"
                                onclick="toggleDropdown()"
                            >
                                NOP
                                <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div
                            class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none hidden"
                            id="dropdown-menu"
                            role="menu"
                            aria-orientation="vertical"
                            aria-labelledby="menu-button"
                            tabindex="-1"
                        >
                            <div class="py-1" role="none">
                                @foreach($nops as $key => $nop)
                                    <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem"
                                    tabindex="-1"
                                    id="menu-item-{{ $key }}"
                                    data-param="{{ $nop->nop }}">
                                        {{ $nop->nop }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Button Sampai -->
                    <button id="open-modal" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded ml-2"
                    >
                        Import
                    </button>
                </div>
            </div>
        </div>


        <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
        <div class="overflow-x-auto">
        <table class="w-full text-left table-auto min-w-max">
            <thead>
            <tr>
                <th class="p-4 border-b border-slate-200 bg-slate-50" style="width: 50px;">
                <p class="text-sm font-normal leading-none text-slate-500">
                    No
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Site Name
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Severity
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Suspect Problem
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Time Down
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Waktu Saat Ini
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Durasi
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Status Site
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Tim FOP
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Remark
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Ticket SWFM
                </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                <p class="text-sm font-normal leading-none text-slate-500">
                    Action
                </p>
                </th>
            </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
            <tr class="hover:bg-slate-50 border-b border-slate-200">
                <td class="p-4 py-5">
                <p class="block font-semibold text-sm text-slate-800">
                    {{ $no++ }}
                </p>
                </td>
                <td class="p-4 py-5">
                <p class="text-sm text-slate-500">
                    {{ $item->site_name }}
                </p>
                </td>
                <td class="p-4 py-5">
                <p class="text-sm text-slate-500">
                    {{ $item->saverity }}
                </p>
                </td>
                <td class="p-4 py-5">
                <p class="text-sm text-slate-500">
                    {{ $item->suspect_problem }}
                </p>
                </td>
                <td class="p-4 py-5">
                <p class="text-sm text-slate-500">
                    {{ convertDate($item->time_down) }}
                </p>
                </td>
                <td class="p-4 py-5">
                <p class="text-sm text-slate-500">
                    {{ convertDate($item->waktu_saat_ini) }}
                </p>
                </td>
                <td class="p-4 py-5">
                <p class="text-sm text-slate-500">
                    {{ durationConvert($item->waktu_saat_ini, $item->time_down) }}
                </p>
                </td>
                <td class="p-4 py-5">
                <p class="text-sm text-slate-500">
                    {{ $item->status_site }}
                </p>
                </td>
                <td class="p-4 py-5">
                <p class="text-sm text-slate-500">
                    {{ $item->tim_fop }}
                </p>
                </td>
                <td class="p-4 py-5">
                <p class="text-sm text-slate-500">
                    {{ $item->remark }}
                </p>
                </td>
                <td class="p-4 py-5">
                <p class="text-sm text-slate-500">
                    {{ $item->ticket_swfm }}
                </p>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>

        <div class="flex justify-between items-center px-4 py-3">
            <div class="text-sm text-slate-500">
            Showing <b>1-5</b> of 45
            </div>
            <div class="flex space-x-1">
            <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                Prev
            </button>
            <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-white bg-slate-800 border border-slate-800 rounded hover:bg-slate-600 hover:border-slate-600 transition duration-200 ease">
                1
            </button>
            <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                2
            </button>
            <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                3
            </button>
            <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                Next
            </button>
            </div>
        </div>
        </div>

    </div>

    <div id="modal" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Background backdrop -->
    <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <!-- Modal panel -->
    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
    <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Form Content -->
        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
        <!-- File Upload Section -->
        <div class="w-full py-9 bg-gray-50 rounded-2xl border border-gray-300 gap-3 grid border-dashed">
            <!-- Icon and Hint -->
            <div class="grid gap-1">
            <svg
                class="mx-auto"
                width="40"
                height="40"
                viewBox="0 0 40 40"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <g id="File">
                <path
                    id="icon"
                    d="M31.6497 10.6056L32.2476 10.0741L31.6497 10.6056Z..."
                    fill="#4F46E5"
                />
                </g>
            </svg>
            </div>
            <!-- Upload Options -->
            <div class="grid gap-2">
            <h4 class="text-center text-gray-900 text-sm font-medium leading-snug">
                Drag and Drop your file here or
            </h4>
            <div class="flex items-center justify-center">
                <label>
                <input type="file" name="file"  hidden />
                <div
                    class="flex w-28 h-9 px-2 flex-col bg-indigo-600 rounded-full shadow text-white text-xs font-semibold leading-4 items-center justify-center cursor-pointer focus:outline-none"
                >
                    Choose File
                </div>
                </label>
            </div>
            </div>
        </div>
        </div>
        <!-- Action Buttons -->
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
        <button
            type="submit"
            class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto"
        >
            Upload
        </button>
        <button
            id="close-modal"
            type="button"
            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
        >
            Cancel
        </button>
        </div>
    </form>
    </div>
        </div>
    </div>
    </div>






    <script>
        const modal = document.getElementById('modal');
        const openModalButton = document.getElementById('open-modal');
        const closeModalButton = document.getElementById('close-modal');

        // Fungsi untuk membuka modal
        openModalButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
        });

        // Fungsi untuk menutup modal
        closeModalButton.addEventListener('click', () => {
        modal.classList.add('hidden');
        });

        // Menutup modal ketika area di luar modal diklik
        modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
        });
    </script>

    <script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown-menu');
        const isHidden = dropdown.classList.contains('hidden');
        dropdown.classList.toggle('hidden', !isHidden);
    }

    // Close the dropdown if clicking outside
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('dropdown-menu');
        const button = document.getElementById('menu-button');

        if (!dropdown.contains(event.target) && !button.contains(event.target)) {
        dropdown.classList.add('hidden');
        }
    });

    $("a[data-param]").click(function(e) {
            e.preventDefault(); // Mencegah halaman reload

            // Ambil nilai NOP yang dipilih
            var nop = $(this).data("param");

            // Kirim AJAX request untuk mengambil data berdasarkan NOP
            $.ajax({
                url: '/data-by-nop',  // Rute untuk ambil data
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",  // Kirim CSRF token
                    nop: nop
                },
                success: function(response) {
                    // Setelah data diterima, tampilkan di container
                    var dataContainer = $("#data-container");
                    dataContainer.empty(); // Bersihkan data lama
                    if(response.length > 0) {
                        response.forEach(function(item) {
                            dataContainer.append("<p>" + item.site_name + " - " + item.status_site + "</p>");
                        });
                    } else {
                        dataContainer.append("<p>No data available for this NOP.</p>");
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Error: " + error);
                }
            });
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle Users</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-900 text-white">
    <div class="flex">
        @include('components.navbar')
        <div class="flex-1 p-6">
            @include('components.sidebar')
            <div
                class="lg:px-24 lg:py-24 md:py-20 md:px-44 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
                <div class="xl:pt-24 w-full xl:w-1/2 relative pb-12 lg:pb-0">
                    <div class="relative">

                        <div>
                            <img src="https://i.ibb.co/G9DC8S0/404-2.png" />
                        </div>
                        <div class="">
                            <div class="">
                                <h1 class="my-2 text-gray-100 font-bold text-2xl">
                                    Looks like you've found the
                                    doorway to the great nothing
                                </h1>

                                <button
                                    class="sm:w-full lg:w-auto my-2 border rounded md
                                     py-4 px-8 text-center bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none
                                     focus:ring-2 focus:ring-indigo-700 focus:ring-opacity-50">
                                    Go Home</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="https://i.ibb.co/ck1SGFJ/Group.png" />
                </div>
            </div>
        </div>
    </div>
</body>

</html>

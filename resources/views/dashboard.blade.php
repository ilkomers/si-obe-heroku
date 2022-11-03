<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl sm:px-6 lg:px-8">
            <div class="bg-white overflow- shadow-sm sm:rounded-lg">
                <div class="p-1 bg-white border-b border-gray-200">
                     <div class="md:ml-20">
                        <div class="rounded-md p-2 w-72 bg-[#AFC7F5]  ">
                            <div class="flex text-center items-center  ">
                                <div class="gb ">
                                    <img src="{{ asset('img/Gambar Fakultas.png') }}" alt="">
                                </div>
                                <h2 class="ml-3 text-xl text-black">All Faculties</h2>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            顧客詳細
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex">
                        <div class="p-1">
                            <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ $treatment['treatment_edit_url'] }}">編集</a>
                        </div>
                        {{-- <form class="p-1 text-right" action="{{ $treatment['treatment_delete_url'] }}" method="post">
                            @csrf
                            <button class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">削除</button>
                        </form> --}}
                    </div>
                    <div class="bg-white border shadow-sm rounded-xl p-4 mb-3">
                        {{-- <h3 class="text-lg font-bold text-gray-800">
                            {{ $treatment['family_name'] }}{{ $treatment['first_name'] }}
                        </h3> --}}
                        <p class="mt-1 text-s font-medium  text-gray-500">
                            来店日：{{ $treatment['visit_date'] }}
                        </p>
                        {{-- <p class="mt-1 text-s font-medium  text-gray-500">
                            誕生日：{{ $treatment['birthday'] }}
                        </p>
                        <p class="mt-1 text-s font-medium text-gray-500">
                            郵便番号：{{ $treatment['postcode'] }}
                        </p>
                        <p class="mt-1 text-s font-medium text-gray-500">
                            住所：{{ $treatment['prefecture'] }}{{ $treatment['city'] }}{{ $treatment['address'] }}
                        </p>
                        <p class="mt-1 text-s font-medium text-gray-500">
                            電話番号：{{ $treatment['phone_number'] }}
                        </p>
                        <p class="mt-1 text-s font-medium text-gray-500">
                            備考：{{ $treatment['notes'] }}
                        </p>
                        <img src="{{ asset($treatment['photo']) }}" > --}}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
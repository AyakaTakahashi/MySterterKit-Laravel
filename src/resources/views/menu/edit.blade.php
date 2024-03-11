<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メニュー編集
        </h2>
    </x-slot>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <form method="post" action="{{route('menu.store', ['id' => $menu->id])}}" enctype="multipart/form-data" class="px-8 pt-6 pb-8 mb-3">
                            @csrf
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="menu">
                                        メニュー名
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="menu" name="menu" type="text" placeholder=""
                                        value="{{$menu->menu}}"
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="phone_number">
                                        メニュー料金
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="charge" name="charge" type="text" placeholder=""
                                        value="{{$menu->charge}}"
                                    >
                                </div>
                            </div>
                            <button class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                登録
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
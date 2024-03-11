<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>
<script src="{{ asset('js/customers/form.js') }}"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            顧客登録
        </h2>
    </x-slot>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <form method="post" action="{{route('customer.store')}}" enctype="multipart/form-data" class="px-8 pt-6 pb-8 mb-3">
                            @csrf
                            {{-- 顧客氏名 --}}
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="family_name">
                                        顧客氏名（姓）
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="family_name" name="family_name" type="text" placeholder="姓" required
                                    >
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="first_name">
                                        顧客氏名（名）
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="first_name" name="first_name" type="text" placeholder="名" required
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex items-center">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="sex">
                                        性別
                                    </label>
                                    @foreach($sex as $radio_sex)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id={{ $radio_sex['id']}} value={{ $radio_sex['id']}} {{ $radio_sex['id'] == 1 ? "checked" : ""}}>
                                            <label for="sex" class="form-check-label">{{ $radio_sex['value'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-4 flex items-center">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="birthday">
                                        誕生日
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="birthday" name="birthday" type="date" required
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="postcode">
                                        郵便番号（テストデータ: 0640941）
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="postcode" name="postcode" type="text" pattern="^[0-9][0-9]*$" required
                                    >
                                </div>
                                <div class="mt-4">
                                    <button class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" 
                                        id="address_search" type='button'
                                    >
                                        郵便番号検索
                                    </button>
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="prefecture">
                                        都道府県
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="prefecture" name="prefecture" type="text" required
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="city">
                                        市区町村
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="city" name="city" type="text" required
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="address">
                                        番地・ビル名
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" name="address" type="text">
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="phone_number">
                                        電話番号
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone_number" name="phone_number" type="text" pattern="^[0-9][0-9]*$" required>
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="photo">
                                        写真
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="photo" name="photo" type="file" placeholder=""
                                    >
                                    <img id="image">
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="notes">
                                        備考
                                    </label>
                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="notes" name="notes" type="text" placeholder=""></textarea>
                                </div>
                            </div>
                            {{-- 登録ボタン --}}
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
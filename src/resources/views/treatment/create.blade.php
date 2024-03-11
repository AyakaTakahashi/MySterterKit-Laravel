<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>
<script src="{{ asset('js/treatments/form.js') }}"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            施術記録登録
        </h2>
    </x-slot>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <form method="post" action="{{route('treatment.store')}}" enctype="multipart/form-data" class="px-8 pt-6 pb-8 mb-3">
                            @csrf
                            <div class="mb-4 flex items-center">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="family_name">
                                        顧客ID
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="customer_id" name="customer_id" type="text" placeholder="" pattern="^[1-9][0-9]*$" required>
                                </div>
                            </div>
                            <div class="mb-4 flex items-center">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="birthday">
                                        来店日
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="visit_date" name="visit_date" type="date" required>
                                </div>
                            </div>
                            <div class="mb-4 flex items-center">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="sex">
                                        メニュー
                                    </label>
                                    <div class="flex gap-x-6">
                                        @foreach($menu as $checkbox_menu)
                                            <div class="flex">
                                                <input type="checkbox" class="shrink-0 mt-0.5 border-gray-900 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" 
                                                    id={{ $checkbox_menu['id'] }} name="menu[]" value={{ $checkbox_menu['id']}} 
                                                >
                                                <label for="hs-checkbox-group-1" class="text-sm text-gray-500 ms-3 dark:text-gray-900">{{ $checkbox_menu['menu'] }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="prefecture">
                                        施術記録
                                    </label>
                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="treatment_record" name="treatment_record" type="text" placeholder="" required>
                                    </textarea>
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="phone_number">
                                        合計金額
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="total_amount" name="total_amount" type="text" pattern="^[0-9][0-9]*$" required
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="phone_number">
                                        割引額
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        id="coupon" name="coupon" type="text" pattern="^[0-9][0-9]*$" required
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="phone_number">
                                        支払い金額
                                    </label>
                                    <input readonly class="bg-slate-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="payment_amount" name="payment_amount" type="text" pattern="^[0-9][0-9]*$" required
                                    >
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
                            <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-100 text-blue-800 hover:bg-blue-200 disabled:opacity-50 disabled:pointer-events-none dark:hover:bg-blue-900 dark:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                登録
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
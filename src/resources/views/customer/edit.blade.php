<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
</script>
<script src="{{ asset('js/customers/form.js') }}"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            顧客編集
        </h2>
    </x-slot>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <form method="post" action="{{route('customer.store', ['id' => $customer->id])}}" enctype="multipart/form-data" class="px-8 pt-6 pb-8 mb-3">
                            @csrf
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="family_name">
                                        顧客氏名（姓）
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="family_name" name="family_name" type="text" placeholder="姓"
                                        value="{{$customer->family_name}}"
                                    >
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="first_name">
                                        顧客氏名（名）
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="first_name" name="first_name" type="text" placeholder="名"
                                        value="{{$customer->first_name}}"
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="sex">
                                        性別
                                    </label>
                                    @foreach($sex as $radio_sex)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sex" id={{ $radio_sex['id']}} value={{ $radio_sex['id']}} @if ($customer->sex == $radio_sex['id']) checked @endif>
                                            <label for="sex" class="form-check-label">{{ $radio_sex['value'] }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="birthday">
                                        誕生日
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="birthday" name="birthday" type="date" placeholder=""
                                        value="{{$customer->birthday}}"
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="family_name">
                                        郵便番号
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                           id="postcode" name="postcode" type="text" placeholder=""
                                           value="{{$customer->postcode}}"
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
                                        id="prefecture" name="prefecture" type="text" placeholder=""
                                        value="{{$customer->prefecture}}"
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="city">
                                        市区町村
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="city" name="city" type="text" placeholder=""
                                        value="{{$customer->city}}"
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="address">
                                        番地・ビル名
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="address" name="address" type="text" placeholder=""
                                        value="{{$customer->address}}"
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="phone_number">
                                        電話番号
                                    </label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="phone_number" name="phone_number" type="text" placeholder=""
                                        value="{{$customer->phone_number}}"
                                    >
                                </div>
                            </div>
                            <div class="mb-4 flex">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="photo">
                                        写真
                                    </label>
                                    <label class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" for="photo">
                                        写真を選択
                                        <input class="hidden shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                            id="photo" name="photo" type="file" placeholder=""
                                            value="{{$customer->photo}}"
                                        >   
                                    </label>
                                    <img id="image" src="{{ asset($customer->photo) }}" />
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="mr-2">
                                    <label class="block text-gray-700 text-sm font-bold mb-1" for="notes">
                                        備考
                                    </label>
                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="notes" name="notes" placeholder=""
                                    >{{$customer->notes}}</textarea>
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
{{-- <script>
    $("#photo").on("change", function (e) {
        var reader = new FileReader();
        reader.onload = function (e) {
                $("#image").attr("src", e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
    });
</script> --}}

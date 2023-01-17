<div class="flex-auto px-0 pt-0 pb-2">
<!-- Modal toggle -->
<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    <div class="px-6 py-6 lg:px-8">
        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">إضافة موسم جديد</h3>
            <div>
                <label for="name" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">اسم الموسم</label>
                <input type="text" wire:model="season.name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="موسم الإجازة الصيفية" required>
                @if ($errors->has('season.name'))
                    <p class="text-red-500 text-xs italic">{{ $errors->first('season.name') }}</p>
                @endif
            </div>
            <div class="flex items-center mb-4 mt-4">

                <input wire:model="season.status" name="status" id="status" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-300">فعال</label>

                <button type="button" wire:click.prevent="saveSeason" class="mr-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">حفظ</button>
            </div>

    </div>
</div>
    <!-- Main modal -->

    <div class="p-0 overflow-x-auto">
        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
            <thead class="align-bottom">
                <tr>
                    <th class="font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">الإسم</th>
                    <th class="px-6 py-3 pl-2 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">الحالة</th>
                    <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                </tr>
            </thead>
            <tbody>
            @if(!empty($seasons))

                @foreach($seasons as $season)
                <tr>
                    <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <h6 class="mb-0 leading-normal text-sm">{{ $season->name }}</h6>
                    </td>

                    <td class="p-2 border-b flex items-center align-middle text-center">
                        @if($season->status)
                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2 ml-2"></div> فعال
                        @else
                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2 ml-2"></div> غير فعال
                        @endif
                    </td>
                    <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <a href="#" wire:click.prevent="editSeason({{$season->id}})" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">تعديل</a>
                        <a href="#" wire:click.prevent="removeSeason({{$season->id}})" class="font-medium text-red-600 dark:text-red-500 hover:underline">حذف</a>
                    </td>

                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

</div>

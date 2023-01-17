<div>
    <div class="flex flex-wrap  px-3 mb-6">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">الإسم</label>
            <input wire:model="chalet.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" name="name" type="text" placeholder="استراحة العليان" required>
            @if ($errors->has('chalet.name'))
            <p class="text-red-500 text-xs italic">{{ $errors->first('chalet.name') }}</p>
            @endif
        </div>
    </div>
    <div class="flex flex-wrap  px-3 mb-6">
        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="size">الحجم</label>
            <div class="relative">
                <select wire:model="chalet.size" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="size" name="size">
                    @foreach ($SIZES as $k => $size)
                        <option value="{{ $k }}">{{ $size }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="w-full  md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">النوع</label>
        <div class="relative">
            <select wire:model="chalet.type" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="type" name="type">
                    @foreach ($TYPES as $k => $type)
                        <option value="{{ $k }}">{{ $type }}</option>
                    @endforeach

            </select>
        </div>
        </div>
    </div>
    <div class="flex flex-wrap  px-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pool">
            يوجد حمام سباحة
        </label>
        <input wire:model="chalet.pool" class="mr-2 leading-tight" type="checkbox" id="pool" name="pool">
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="external_session">
            يوجد جلسة خارجية
        </label>
        <div class="relative">
            <input wire:model="chalet.external_session" class="mr-2 leading-tight" type="checkbox" id="external_session" name="external_session">
        </div>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="contact">
            رقم التواصل
        </label>
        <input wire:model="chalet.contact" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="contact" name="contact" type="text" placeholder="0501234567">
        @if ($errors->has('chalet.contact'))
        <p class="text-red-500 text-xs italic">{{ $errors->first('chalet.contact') }}</p>
        @endif
        </div>
    </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    الموسم
                </th>
                <th scope="col" class="px-6 py-3">
                    السعر
                </th>
                <th scope="col" class="px-6 py-3">

                </th>
            </tr>
        </thead>
        <tbody>
        @if(!empty($chaletSeasons))
            @foreach($chaletSeasons as $index => $chaletSeason)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="w-100 p-4">
                    @if(isset($chaletSeason['is_saved']) && $chaletSeason['is_saved'])
                                <input type="hidden" name="chaletSeasons[{{$index}}]['price_id']" wire:model="chaletSeasons.{{$index}}.price_id" />
                                {{ $seasons_list[$chaletSeason['season_id']] }}
                            @else
                                <select name="chaletSeasons[{{$index}}]['season_id']" wire:model="chaletSeasons.{{$index}}.season_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    @foreach ($seasons as $season_id => $season_name)
                                        <option value="{{ $season_id }}">{{ $season_name }}</option>
                                    @endforeach

                                </select>
                            @endif
                            @if ($errors->has('chaletSeasons.'.$index))
                            <p class="text-red-500 text-xs italic">{{ $errors->first('chaletSeasons.'.$index) }}</p>
                            @endif
                </td>
                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    @if(isset($chaletSeason['is_saved']) && $chaletSeason['is_saved'])
                                <input name="chaletSeasons[{{$index}}]['price']" wire:model="chaletSeasons.{{$index}}.price" type="hidden">
                                {{ $chaletSeason['price'] }}
                            @else
                                <input name="chaletSeasons[{{$index}}]['price']" wire:model="chaletSeasons.{{$index}}.price" min="0" class="bg-gray-50 w-full border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="number" required>
                            @endif
                </td>
                <td class="px-6 py-4">
                    @if(isset($chaletSeason['is_saved']) && $chaletSeason['is_saved'])
                                <button class="font-medium text-blue-600 dark:text-blue-500 hover:underline" wire:click.prevent="editSeason({{$index}})"> تعديل </button>
                            @else
                                <button class="font-medium text-green-600 dark:text-green-500 hover:underline" wire:click.prevent="saveSeason({{$index}})"> حفظ </button>
                            @endif

                            <button class="font-medium text-red-600 dark:text-red-500 hover:underline mr-3" wire:click.prevent="removeSeason({{$index}})"> حذف </button>

                </td>
            </tr>
            <?php if(isset($chaletSeason['is_saved']) && $chaletSeason['is_saved']) unset($seasons[$chaletSeason["season_id"]]);?>
            @endforeach
        @endif
        </tbody>
    </table>
</div>

    <div class="flex flex-wrap  px-3 mb-6">

        @if(!empty($this->seasons->toArray()))
        <button class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-1.5 mr-2 mt-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700" wire:click.prevent="addSeason"> إضافة سعر </button>

        @endif
    </div>
        <br />
        <button wire:click.prevent="saveChaletSeasons" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">حفظ البيانات</button>
</div>

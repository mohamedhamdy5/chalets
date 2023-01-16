<div>
<div class="flex flex-wrap  px-3 mb-6">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">الإسم</label>
        <input wire:model="chalet.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="name" name="name" type="text" placeholder="استراحة العليان" required>
        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
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
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
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
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    </div>
    <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
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
    </div>



</div>






    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
        <thead class="align-bottom">
            <tr>
            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">الموسم</th>
            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">السعر</th>
            <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
            </tr>
        </thead>
        <tbody>
        @if(!empty($chaletSeasons))

            @foreach($chaletSeasons as $index => $chaletSeason)

                <tr>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
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


                    </td>

                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        @if(isset($chaletSeason['is_saved']) && $chaletSeason['is_saved'])
                            <input name="chaletSeasons[{{$index}}]['price']" wire:model="chaletSeasons.{{$index}}.price" type="hidden">
                            {{ $chaletSeason['price'] }}
                        @else
                            <input name="chaletSeasons[{{$index}}]['price']" wire:model="chaletSeasons.{{$index}}.price" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
                        @endif

                    </td>


                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        @if(isset($chaletSeason['is_saved']) && $chaletSeason['is_saved'])
                            <button class="font-semibold leading-tight text-xs text-slate-400" wire:click.prevent="editSeason({{$index}})"> تعديل </button>
                        @else
                            <button class="font-semibold leading-tight text-xs text-slate-400" wire:click.prevent="saveSeason({{$index}})"> حفظ </button>
                        @endif

                        <button class="font-semibold leading-tight text-xs text-slate-400" wire:click.prevent="removeSeason({{$index}})"> حذف </button>


                    </td>
                </tr>
                <?php unset($seasons[$chaletSeason["season_id"]]);?>
            @endforeach
        @endif
        </tbody>
    </table>
    @if(!empty($this->seasons->toArray()))
    <button class="font-semibold leading-tight text-xs text-slate-400" wire:click.prevent="addSeason"> إضافة سعر </button>
    @endif
    <br />
    <button wire:click.prevent="saveChaletSeasons" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">حفظ البيانات</button>
</div>

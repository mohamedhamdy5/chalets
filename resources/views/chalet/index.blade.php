@extends('layouts.master')

@section('page_title', 'الإستراحات')

@section('content')
   <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6>@yield('page_title')</h6>
                </div>

                <div class="flex-auto px-0 pt-0 pb-2 mt-4">

                    <a href="{{route('chalet.create')}}" class="m-4 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">إضافة إستراحة</a>

                    <div class="p-0 mt-4 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th class="font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">الإسم</th>
                                    <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">الحجم</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">النوع</th>
                                    <th class="px-6 py-3 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">حمام السباحة</th>
                                    <th class="px-6 py-3 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">جلسات خارجية</th>
                                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">التواصل</th>
                                    <th class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70"></th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($chalets))

                                @foreach($chalets as $chalet)
                                <tr>
                                    <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <h6 class="mb-0 leading-normal text-sm">{{ $chalet->name }}</h6>
                                    </td>
                                    <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs">{{ $SIZES[$chalet->size] }}</p>
                                    </td>

                                    <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                        <span class="font-semibold leading-tight text-xs text-slate-400">{{ $TYPES[$chalet->type] }}</span>
                                    </td>


                                    <td class="p-2 border-b flex items-center align-middle text-center">

                                        @if($chalet->pool)
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2 ml-2"></div> يوجد
                                        @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2 ml-2"></div> لا يوجد
                                        @endif

                                    </td>

                                    <td class="p-2 border-b flex items-center align-middle text-center">

                                        @if($chalet->external_session)
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2 ml-2"></div> يوجد
                                        @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2 ml-2"></div> لا يوجد
                                        @endif
                                    </td>
                                    <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <h6 class="mb-0 leading-normal text-sm">{{ $chalet->contact }}</h6>
                                    </td>

                                    <td class="p-2 align-middle text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <a href="{{route('chalet.edit', $chalet->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">تعديل</a>
                                        <a href="{{route('chalet.destroy', $chalet->id)}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

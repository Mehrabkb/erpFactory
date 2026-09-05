<x-app-layout>

    <div class="space-y-6">


        <div class="flex justify-between items-center">

            <div>

                <h1 class="text-2xl font-bold">
                    واحدها
                </h1>

                <p class="text-gray-500 text-sm">
                    مدیریت واحدهای سازمانی
                </p>

            </div>


            <a
                href="{{ route('departments.create') }}"
                class="
                bg-blue-600
                text-white
                px-4
                py-2
                rounded-lg
                "
            >
                + افزودن واحد
            </a>

        </div>



        <div class="bg-white rounded-xl shadow">


            <table class="w-full">


                <thead class="bg-gray-50">

                <tr>

                    <th class="p-4 text-right">
                        نام
                    </th>


                    <th class="p-4 text-right">
                        وضعیت
                    </th>


                    <th class="p-4">
                        عملیات
                    </th>


                </tr>


                </thead>



                <tbody>


                @foreach($departments as $department)


                    <tr class="border-t">


                        <td class="p-4">

                            {{ $department->name }}

                        </td>


                        <td class="p-4">


                            @if($department->is_active)

                                <span class="
                                bg-green-100
                                text-green-700
                                px-3
                                py-1
                                rounded-full
                                text-xs
                                ">
                                    فعال
                                </span>

                            @else

                                <span class="
                                bg-red-100
                                text-red-700
                                px-3
                                py-1
                                rounded-full
                                text-xs
                                ">
                                    غیرفعال
                                </span>

                            @endif


                        </td>


                        <td class="p-4">


                            <a
                                href="{{ route('departments.edit',$department) }}"
                                class="text-blue-600"
                            >
                                ویرایش
                            </a>


                        </td>


                    </tr>


                @endforeach


                </tbody>


            </table>


        </div>


        {{ $departments->links() }}


    </div>


</x-app-layout>

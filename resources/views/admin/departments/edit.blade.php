<x-app-layout>


    <div class="max-w-xl">


        <div class="mb-6">

            <h1 class="text-2xl font-bold">
                ویرایش واحد
            </h1>

            <p class="text-gray-500 text-sm">
                تغییر اطلاعات واحد سازمانی
            </p>

        </div>



        <form
            method="POST"
            action="{{ route('departments.update',$department) }}"
            class="bg-white p-6 rounded-xl shadow"
        >

            @csrf

            @method('PUT')



            {{-- Name --}}

            <div class="mb-5">

                <label class="block mb-2">
                    نام واحد
                </label>


                <input
                    name="name"
                    value="{{ old('name',$department->name) }}"
                    class="
                w-full
                border
                rounded-lg
                p-3
                "
                >


                @error('name')

                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>

                @enderror


            </div>





            {{-- Status --}}

            <div class="mb-5">


                <label class="block mb-2">
                    وضعیت
                </label>



                <select
                    name="is_active"
                    class="
                w-full
                border
                rounded-lg
                p-3
                "
                >


                    <option
                        value="1"
                        @selected(
                            old(
                                'is_active',
                                $department->is_active
                            ) == 1
                        )
                    >
                        فعال
                    </option>



                    <option
                        value="0"
                        @selected(
                            old(
                                'is_active',
                                $department->is_active
                            ) == 0
                        )
                    >
                        غیرفعال
                    </option>


                </select>


                @error('is_active')

                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>

                @enderror


            </div>





            <div class="flex gap-3">


                <button
                    class="
                bg-blue-600
                text-white
                px-5
                py-3
                rounded-lg
                "
                >
                    ذخیره تغییرات
                </button>



                <a
                    href="{{ route('departments.index') }}"
                    class="
                bg-gray-200
                px-5
                py-3
                rounded-lg
                "
                >
                    انصراف
                </a>


            </div>



        </form>


    </div>


</x-app-layout>

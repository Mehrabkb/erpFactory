<x-app-layout>


    <div class="max-w-xl">


        <h1 class="text-2xl font-bold mb-6">
            ایجاد واحد جدید
        </h1>


        <form
            method="POST"
            action="{{ route('departments.store') }}"
            class="bg-white p-6 rounded-xl shadow"
        >

            @csrf


            <label class="block mb-2">
                نام واحد
            </label>


            <input
                name="name"
                class="
w-full
border
rounded-lg
p-3
"
                placeholder="مثلاً تولید"
            />


            @if($errors->has('name'))

                <p class="text-red-500 text-sm mt-2">

                    {{ $errors->first('name') }}

                </p>

            @endif



            <button
                class="
mt-6
bg-blue-600
text-white
px-5
py-3
rounded-lg
"
            >

                ذخیره

            </button>



        </form>


    </div>


</x-app-layout>

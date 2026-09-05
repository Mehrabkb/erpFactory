<x-app-layout>


    <div class="space-y-6">


        <div>

            <h1 class="text-2xl font-bold">

                {{ $process->name }}

            </h1>


            <p class="text-gray-500">

                مدیریت مراحل فرآیند

            </p>

        </div>




        <div class="bg-white rounded-xl shadow p-6">


            <h2 class="font-bold mb-5">

                مراحل فرآیند

            </h2>




            <div class="space-y-3">


                @foreach($process->steps as $step)


                    <div
                        class="
border
rounded-lg
p-4
flex
justify-between
items-center
"
                    >


                        <div>


                            <div class="font-bold">

                                {{ $step->sort_order }} -
                                {{ $step->name }}

                            </div>



                            @if($step->department)

                                <span class="text-sm text-gray-500">

واحد:
{{ $step->department->name }}

</span>

                            @endif


                        </div>




                        <form
                            method="POST"
                            action="{{route('process.steps.destroy',$step)}}"
                        >


                            @csrf

                            @method('DELETE')


                            <button
                                class="text-red-600"
                            >

                                حذف

                            </button>


                        </form>


                    </div>


                @endforeach


            </div>



        </div>





        {{-- افزودن مرحله --}}

        <div
            x-data="{open:false}"
            class="bg-white rounded-xl shadow p-6"
        >


            <button
                @click="open=!open"
                class="
bg-blue-600
text-white
px-4
py-2
rounded-lg
"
            >

                + افزودن مرحله

            </button>




            <form
                x-show="open"
                method="POST"
                action="{{route('process.steps.store',$process)}}"
                class="mt-5 space-y-4"
            >


                @csrf


                <input
                    name="name"
                    class="
border
rounded-lg
p-3
w-full
"
                    placeholder="نام مرحله"
                />




                <select
                    name="department_id"
                    class="
border
rounded-lg
p-3
w-full
"
                >


                    <option value="">
                        انتخاب واحد
                    </option>



                    @foreach(\App\Models\Department::where('is_active',true)->get() as $department)


                        <option value="{{$department->id}}">

                            {{$department->name}}

                        </option>


                    @endforeach


                </select>



                <button
                    class="
bg-green-600
text-white
px-4
py-2
rounded-lg
"
                >

                    ذخیره مرحله

                </button>



            </form>



        </div>



    </div>


</x-app-layout>

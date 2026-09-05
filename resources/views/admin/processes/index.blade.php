<x-app-layout>


    <div>


        <div class="flex justify-between mb-6">


            <h1 class="text-2xl font-bold">
                فرآیندها
            </h1>


            <a
                href="{{route('processes.create')}}"
                class="
bg-blue-600
text-white
px-4
py-2
rounded-lg
"
            >
                + فرآیند جدید
            </a>


        </div>




        <div class="bg-white rounded-xl shadow">


            @foreach($processes as $process)


                <div class="
p-5
border-b
flex
justify-between
">


                    <div>


                        <h3 class="font-bold">

                            {{ $process->name }}

                        </h3>


                        <p class="text-gray-500 text-sm">

                            {{ $process->description }}

                        </p>


                    </div>



                    <a
                        href="{{route('processes.show',$process)}}"
                        class="text-blue-600"
                    >
                        مدیریت مراحل
                    </a>


                </div>


            @endforeach


        </div>


    </div>


</x-app-layout>

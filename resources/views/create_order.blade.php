<x-layout>
    <x-setting heading="Publish New Order">
        <form method="post" action="/create_order" enctype="multipart/form-data">
            @csrf

            <div class="grid">

                <label for="name" class="my-4 py-1">Order Name:</label>
                <input type="text" name="name" class="border-2 rounded">

                <label for="cid" class="my-4 py-1">Customer ID:</label>
                <input type="text" name="cid" class="border-2 rounded">

                <button type="submit" class="bg-blue-200 rounded-xl w-40 text-center ml-auto mt-10">Publish</button>

            </div>

        </form>
    </x-setting>

</x-layout>

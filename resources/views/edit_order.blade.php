<x-layout>
    <x-setting heading="Edit Order {{ $order->order_name }}">

        <form method="post" action="/edit_order/{{ $order->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="grid">

                <label for="name" class="my-4 py-1">Order Name:</label>
                <input type="text" name="name" class="border-2 rounded" value="{{ $order->order_name }}">

                <label for="cid" class="my-4 py-1">Customer ID:</label>
                <input type="text" name="cid" class="border-2 rounded" value="{{ $order->customer_id }}">

                <button type="submit" class="bg-blue-200 rounded-xl w-40 text-center ml-auto mt-10">Update</button>

            </div>

        </form>
    </x-setting>

</x-layout>

<x-app-layout>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Import Excel Prices') }}
                        </h2>
                    </header>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('product-management.upload')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input type="file" name="file" required>
                            </div>
                        </div>
                        <button class="btn btn-primary  btn-block" type="submit">Import Excel</button>
                    </form>
                </section>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div>
                    <table>
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>product_type</th>
                            <th>frame</th>
                            <th>glass</th>
                            <th>handle</th>
                            <th>base_price</th>
                            <th>upgrade</th>
                            <th>add_on</th>
                            <th>unit</th>
                            <th>glass_upgrade</th>
                            <th>multiplier</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($prices as $price)
                            <tr>
                                <td>{{$price->id}}</td>
                                <td>{{$price->product_type}}</td>
                                <td>{{$price->frame}}</td>
                                <td>{{$price->glass}}</td>
                                <td>{{$price->handle}}</td>
                                <td>{{$price->base_price}}</td>
                                <td>{{$price->upgrade}}</td>
                                <td>{{$price->add_on}}</td>
                                <td>{{$price->unit}}</td>
                                <td>{{$price->glass_upgrade}}</td>
                                <td>{{$price->multiplier}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

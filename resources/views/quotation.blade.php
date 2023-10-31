<x-app-layout>
    <div class="mb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-2">
                    @include('quotation.add-location')
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-2">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-xl font-medium text-gray-900">
                                {{ __('Compares Quotations') }}
                            </h2>
                        </header>
                        <div class="row">
                            <div class="col-lg-3 col-sm-3">
                                <h6 class="text-center">Quotation 1</h6>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td width="50%">Base Price</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Upgrades</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Glass Upgrade</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary btn-sm btn-block " type="button" id="">Select</button>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <h6 class="text-center">Quotation 1</h6>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td width="50%">Base Price</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Upgrades</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Glass Upgrade</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary btn-sm btn-block " type="button" id="">Select</button>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <h6 class="text-center">Quotation 1</h6>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td width="50%">Base Price</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Upgrades</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Glass Upgrade</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary btn-sm btn-block " type="button" id="">Select</button>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <h6 class="text-center">Quotation 1</h6>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td width="50%">Base Price</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Upgrades</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Glass Upgrade</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><span class=""></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary btn-sm btn-block " type="button" id="">Select</button>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    @include('quotation.customer-form')
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                </div>
            </form>
        </div>
    </div>
    @include('preview')
    @push('scripts')
        <script src="{{asset('/js/image-preview.js')}}"></script>
    @endpush
</x-app-layout>

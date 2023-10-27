<x-app-layout>
    <div class="mb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <form action="">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mb-2">
                    @include('quotation.add-location')
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

<section>
    <header class="flex justify-content-between mb-2">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Employees List') }}
        </h2>
        <a href="{{ route('employees.create') }}" class="btn btn-success">Add</a>
    </header>

    <div class="row">

        <div class="col-12">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
{{--                    <th>Branch</th>--}}
                    <th width="4"></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->username}}</td>
{{--                            <td>{{$user->branch}}</td>--}}
                            <td>
                                <div class="btn-group" role="group" aria-label="Item Actions">
                                    <a href="{{ route('employees.edit', $user->id) }}" class="btn btn-primary">View</a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</section>

@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Table With Full Features</h3>
                                <a class="btn btn-rounded btn-primary mb-5" style="float: right;"
                                    href="{{ route('users.add') }}">Add
                                    user</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Role</th>
                                                <th>Name</th>
                                                <th>Emil</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $user)
                                                <tr>
                                                    <td width="5%">{{ $key + 1 }}</td>

                                                    <td>{{ $user->usertype }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td width="20%">
                                                        <a href="{{ route('users.edit', $user->id) }} "
                                                            class="btn btn-rounded btn-info mb-5">Edit</a>
                                                        <a href="{{ route('users.delete', $user->id) }}"
                                                            class="btn btn-rounded btn-danger mb-5"
                                                            id="delete">Delete</a>
                                                    </td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
@endsection

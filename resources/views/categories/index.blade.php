@extends('layouts.app')
@section('content')
    <!-- /header -->
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-10">
                    <h2>
                        <center>KLP BEVERAGE TRADING</center>
                    </h2>

                </div>

            </div>
    </div>

    <!-- Header-->



    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="container">

                    <div class="content">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h3 class="m-2 font-weight-bold text-primary">Categories&nbsp;
                                    <!-- MODAL for ADDING BEVERAGES-->
                                    <a href="#myModal" role="button" class="btn btn-md btn-primary"
                                        data-bs-toggle="modal"><i class="fas fa-fw fa-plus"></i>Add</a>
                                    </h>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="userTable" class="table">
                                        <thead>

                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th colspan="2">Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->cat_name }}</td>
                                                    <td class="align-middle">
                                                        <a href="/categories/{{ $category->id }}"
                                                            class="btn btn-primary mx-2" data-toggle="tooltip"
                                                            data-original-title="Edit user">
                                                            View
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="/categories/{{ $category->id }}/edit"
                                                            class="btn btn-primary mx-2" data-toggle="tooltip"
                                                            data-original-title="Edit user">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- .animated -->
        </div><!-- .content -->

        <!-- .animated -->
    </div><!-- .content -->
    <!--/.col-->
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Category Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action' => 'CategoriesController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        <input class="form-control" placeholder="Category Name" name="cat_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="save">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    </html>
@endsection

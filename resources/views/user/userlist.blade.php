@extends('layouts.app')

@section('content')
<style>
    .activepageitem {
        border: 2px solid #80808030;
    }
    .prev_next_button{
            padding: 0.375rem 0.75rem;
        position: relative;
        display: block;
        color: #0d6efd;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #dee2e6;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
</style>
<!--    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('User List') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                    </div>
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                </div>
                <table class="table table-striped" id="users-table-ajax">
                    <div class="row">
                        <div class="col-md-1 ">
                            <select class="form-control" id="page_show" name="page_show">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                            </select>
                        </div>
                        <div class="col-md-2 offset-8">
                            <input type="text" name="search" id="search" class="form-control">
                        </div>
                    </div>
                    <thead>
                        <tr>
                            <th>No &nbsp;<a href="" data-id="asc" class="sortdata order_active" data-column="id"><i class="fas fa-arrows-v" style="color:black"></i></a></th>
                            <th>Name &nbsp;<a href="" data-id="asc" class="sortdata" data-column="name"><i class="fas fa-arrows-v" style="color:black"></i></a></th>
                            <th>Email &nbsp;<a href=""data-id="asc" class="sortdata" data-column="email"><i class="fas fa-arrows-v" style="color:black"></i></a></th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>
                <div id="pagination-data"></div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/user/userlist.js') }}" ></script>
<script>

</script>
@endsection


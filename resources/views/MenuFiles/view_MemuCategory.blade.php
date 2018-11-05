@extends('layout.master.master')

@section('title','List of Menu Category')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    <a href="#" class="btn btn-sm bg-danger btnSet btn-primary add-user pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New Category</a>
    <h3 class="heading">List of Category</h3>
    <hr/>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if($errors->any())
        <div role='alert' id='alert' class='alert alert-danger'>{{$errors->first()}}</div>
    @endif
    <div class="row fa-border">
        <div class="container-fluid">
            <table id="dataTable" class="display compact" cellspacing="0" width="100%">
                <thead>
                <tr class="bg-info">
                    <th class="hidden">Id</th>
                    <th class="options">Options</th>
                    <th>Category Name</th>
                    <th>Discriptions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($MenuCategory)>0)
                    @foreach($MenuCategory as $MenuCategory)
                        <tr>
                            <td class="hidden">{{$MenuCategory->McatID}}</td>
                            <td id="{{$MenuCategory->McatID}}">
                                <a href="#" id="{{$MenuCategory->McatID}}" class="btn btn-sm btn-default edit-unit_"
                                   title="Edit unit">
                                    <span class="fa fa-pencil"></span></a>
                                {{--@if($_SESSION['user_master']->id != $user_master->id)--}}

                                <button type="button" id="{{ $MenuCategory->McatID }}"
                                        class="btn btn-sm btn-danger btnDelete" title="Inactivate"><span
                                            class="fa fa-trash-o" aria-hidden="true"></span></button>
                                {{--@endif--}}
                            </td>
                            <td>{{$MenuCategory->CategoryName}}</td>
                            <td>{{$MenuCategory->Discriptions}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <br/>
    <script>
        $('.btnDelete').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            $('#myModal .modal-title').html('Confirm Detletion');
            $('#myModal .modal-body').html('<h5>Are you sure want to Delete this Unit<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('MCATE') }}/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $('.btnActive').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            $('#myModal .modal-title').html('Confirm Activation');
            $('#myModal .modal-body').html('<h5>Are you sure want to activate this user<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="{{ url('user_master') }}/' + id +
                '/activate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add New Type');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('MCATE/create') }}",
                success: function (data) {
                    $('.modal-body').html(data);
//            $('#modelBtn').visible(disabled);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });

        });
        $(".edit-unit_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit Unit');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/MCATE/" + id + "/edit";
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: editurl,
                data: '{"data":"' + id + '"}',
                success: function (data) {
                    $('.modal-body').html(data);
                },
                error: function (xhr, status, error) {
                    $('.modal-body').html(xhr.responseText);
                    //$('.modal-body').html("Technical Error Occured!");
                }
            });
        });


        $(document).ready(function () {
            var table = $('#dataTable').DataTable({
                "columnDefs": [
                    {"width": "20px", "targets": 0}
                ]
            });

            $('.datatable-col').on('keyup change', function () {
                table.column($(this).attr('id')).search($(this).val()).draw();
            });
        });
    </script>
@stop

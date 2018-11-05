@extends('layout.master.master')

@section('title','List of Item Category')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    <a href="#" class="btn btn-sm bg-danger btnSet btn-primary add-user pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New Item Category</a>
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
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @if(count($ItemCategory)>0)
                    @foreach($ItemCategory as $ItemCategory)
                        <tr>
                            <td class="hidden">{{$ItemCategory->ICatId}}</td>
                            <td id="{{$ItemCategory->ICatId}}">
                                <a href="#" id="{{$ItemCategory->ICatId}}" class="btn btn-sm btn-default edit-unit_"
                                   title="Edit unit">
                                    <span class="fa fa-pencil"></span></a>
                                {{--@if($_SESSION['user_master']->id != $user_master->id)--}}

                                <button type="button" id="{{ $ItemCategory->ICatId }}"
                                        class="btn btn-sm btn-danger btnDelete" title="Inactivate"><span
                                            class="fa fa-trash-o" aria-hidden="true"></span></button>
                                {{--@endif--}}
                            </td>
                            <td>{{$ItemCategory->Cat_Name}}</td>

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
            $('#myModal .modal-body').html('<h5>Are you sure want to inactive this category<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('ItemCat') }}/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $('.btnActive').click(function () {
            var id = $(this).attr('id');
            $('#myModal').modal('show');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{ url('assets/img/loading.gif') }}"/>');
            $('#myModal .modal-title').html('Confirm Activation');
            $('#myModal .modal-body').html('<h5>Are you sure want to activate this category<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-success" href="{{ url('user_master') }}/' + id +
                '/activate"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Create new category');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('ItemCat/create') }}",
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
            $('.modal-title').html('Edit new category');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/ItemCat/" + id + "/edit";
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

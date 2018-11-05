@extends('layout.master.master')

@section('title','List of Menu Items')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    <a href="{{url('Menu/create')}}" class="btn btn-sm bg-danger btnSet btn-primary pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New Menu</a>
    <h3 class="heading">List of Menus</h3>
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
                    <th class="options sorting">Options</th>
                    <th>Name</th>
                    <th>SubCategory</th>
                    <th>Description</th>
                    <th>Act Price</th>
                    <th>Sale price</th>
                    <th>Tax Percent</th>
                </tr>
                </thead>
                <tbody>
                @if(count($Menus)>0)
                    @foreach($Menus as $Menus)
                        <tr>
                            <td class="hidden sorting_1">{{$Menus->MID}}</td>
                            <td class="options two_option" id="{{$Menus->MID}}">
                                <a href="{{url('Menu'.'/'.$Menus->MID.'/edit')}}" id="{{$Menus->MID}}"
                                   class="btn btn-sm btn-default -user_"
                                   title="Edit User">
                                    <span class="fa fa-pencil"></span></a>

                                <button type="button" id="{{ $Menus->MID }}"
                                        class="btn btn-sm btn-danger btnDelete" title="Inactivate"><span
                                            class="fa fa-trash-o" aria-hidden="true"></span></button>
                            </td>
                            <td>{{$Menus->M_Name}}</td>
                            <td>{{$Menus->menucategory->CategoryName}}</td>
                            <td>{{$Menus->Descriptions}}</td>
                            <td>{{$Menus->Act_Price}}</td>
                            <td>{{$Menus->Sale_Price}}</td>
                            <td>@if($Menus->percent_id != null){{$Menus->tax->type." ".$Menus->tax->percent}}@else
                                    - @endif</td>
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
            $('#myModal .modal-title').html('Confirm Inactivation');
            $('#myModal .modal-body').html('<h5>Are you sure want to Inactivate this Menu Item<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('Menu') }}/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });

        $(".add-user").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Add New Menu');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');
            //alert(id);
            $.ajax({
                type: "GET",
                contentType: "application/json; charset=utf-8",
                url: "{{ url('Menu/create') }}",
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
        $(".edit-user_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit Menu');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/Menu/" + id + "/edit";
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

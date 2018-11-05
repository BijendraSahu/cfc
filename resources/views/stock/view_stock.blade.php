@extends('layout.master.master')

@section('title','Stock List')

@section('content')
    {{--<script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>--}}
    {{--<link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel='stylesheet'/>--}}
    <a href="{{url('stock/create')}}" class="btn btn-sm bg-danger btnSet btn-primary add-tour btnSet pull-right">
        <span class="fa fa-plus"></span>&nbsp;Create New Stock</a>
    <h3 class="heading">List of Stock</h3>
    <hr/>
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
                    <th>Stock#</th>
                    <th>Bill/Challan No</th>
                    <th>Bill/Challan Date</th>
                    <th>Supplier Name</th>
                    <th>Total Amt</th>
                    {{--<th>Booking Status</th>--}}
                </tr>
                </thead>
                <tbody>
                @if(count($stocks)>0)
                    @foreach($stocks as $stock)
                        <tr>
                            <td class="hidden">{{$stock->id}}</td>
                            <td id="{{$stock->id}}">
                                <div class="btn-group action">
                                    <button type="button" class="btn btn-sm btn-success dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">Options
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul id="{{$stock->id}}" class="dropdown-menu">
                                        <li><a href="#" id="{{$stock->id}}" class="view-list"><i class="fa fa-eye
                                        text-info">&nbsp;</i>View Stock</a>
                                        </li>

                                    </ul>
                                </div>
                                {{--@if($stock->is_booked == 0)--}}
                                {{--<button type="button" id="{{ $stock->id }}"--}}
                                {{--class="btn btn-sm btn-success btnBook" title="Book"><span--}}
                                {{--class="fa fa-check" aria-hidden="true"></span></button>--}}
                                {{--@else--}}
                                {{--<button type="button" id="{{ $stock->id }}"--}}
                                {{--class="btn btn-sm btn-primary btnAvailable" title="Make it Avaialble"><span--}}
                                {{--class="fa fa-reply-all" aria-hidden="true"></span></button>--}}
                                {{--@endif--}}
                            </td>
                            <td>{{$stock->stock_no}}</td>
                            <td>{{$stock->bill_no}}{{$stock->challan_no}}
                            </td>
                            <td>@if($stock->challan_date != null){{date_format(date_create($stock->challan_date), "d-M-Y")}}
                                @else{{date_format(date_create($stock->bill_date), "d-M-Y")}}
                                @endif
                            </td>
                            <td>{{$stock->supplier->S_Name}}</td>
                            <td>{{$stock->total_amount}}</td>
                            {{--<td>@if($stock->is_booked == 1) <p class="bg-danger">Booked</p>--}}
                            {{--@else--}}
                            {{--<p class="bg-success">Available</p>--}}
                            {{--@endif--}}
                            {{--</td>--}}
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
            $('#myModal .modal-title').html('Confirm Deletion');
            $('#myModal .modal-body').html('<h5>Are you sure want to delete this tour<h5/>');
            $('#modalBtn').html('<a class="btn btn-sm btn-danger" href="{{ url('tour') }}/' + id +
                '/delete"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Confirm</a>'
            );
        });
        {{--$(".add-tour").click(function () {--}}
            {{--$('#myModal').modal('show');--}}
            {{--$('.modal-title').html('Add New Tour');--}}
            {{--$('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');--}}
            {{--//alert(id);--}}
            {{--$.ajax({--}}
                {{--type: "GET",--}}
                {{--contentType: "application/json; charset=utf-8",--}}
                {{--url: "{{ url('tour/create') }}",--}}
                {{--success: function (data) {--}}
                    {{--$('.modal-body').html(data);--}}
{{--//            $('#modelBtn').visible(disabled);--}}
                {{--},--}}
                {{--error: function (xhr, status, error) {--}}
                    {{--$('.modal-body').html(xhr.responseText);--}}
                    {{--//$('.modal-body').html("Technical Error Occured!");--}}
                {{--}--}}
            {{--});--}}

        {{--});--}}
        $(".edit-tour_").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Edit Tour');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/tour/" + id + "/edit";
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

        $(".view-list").click(function () {
            $('#myModal').modal('show');
            $('.modal-title').html('Stock List');
            $('.modal-body').html('<img height="50px" class="center-block" src="{{url('assets/img/loading.gif')}}"/>');

            var id = $(this).attr('id');
            var editurl = '{{ url('/') }}' + "/stock/" + id;
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

@extends('templates.master')
@section('css')

@endsection

@section('content')
<style>
    <?php include(public_path().'/assets/bootstrap3/css/bootstrap.min.css');?>
    <?php include(public_path().'/assets/css/report.css');?>
</style>

<div class="container">
    <div class="row mt-3">
        <div class="col-xs-2" align="left">
            <img src="{{ Voyager::image(setting('site.vtoc-logo')) }}" alt="logo-vtoc">
            
        </div>
        <div class="col-xs-10" align="right">
            <h3>{{ $datasum['companyname'] }}</h3>            
            <ul class="list-unstyled">
                <li>{{ $datasum['address'] }}</li>
                <li>(84) 935 795 179 - (84) 905 396 336</li>
                <li>info@vtoc.vn</li>
            </ul>
        </div>        
    </div>
    <div class="mt-3" align="center">
        <h3>{{ $datasum['title'] }}</h3>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <ul class="list-unstyled">
                <li>{{ $datasum['customer'] }}: {{ $datasum['sitename'] }}</li>
                <li>{{ $datasum['staff'] }}: {{ $datasum['uname'] }}</li>
            </ul>
        </div>
        <div class="col-xs-6" align="right">
            <ul class="list-unstyled">
                <li>Report: IT Support Daily Report</li>
                <li>{{ $datasum['from'] }}: {{ date('d-m-Y', strtotime($datasum['fromdate'])) }} {{ $datasum['to'] }} {{ date('d-m-Y', strtotime($datasum['enddate'])) }}</li>
            </ul>
        </div>
    </div>
    <table class="table table-bordered ">        
        <thead class="thead-dark">
            <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">{{ $datasum['col1'] }}</th>
            <th scope="col">{{ $datasum['col2'] }}</th>
            <th scope="col" class="text-center">{{ $datasum['col3'] }}</th>
            <th scope="col" class="text-center">{{ $datasum['col4'] }}</th>
            <th scope="col" class="text-center">{{ $datasum['col5'] }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataTypeContent as $row)
                <tr>
                    <th class="text-center vertical" scope="row">{{$row->id}}</th>
                    <td class="text-center vertical">{{ date('d-m-Y', strtotime($row->date)) }} </td>
                    <td>
                        <strong>{{$row->subject}}</strong>
                        <ul class="list-unstyled task-detail">
                            <li>{!!html_entity_decode($row->detail)!!}</li>
                        </ul>
                    </td>
                    <td class="text-center vertical">{{$row->typename}}</td>
                    <td class="text-center vertical">{{$row->requestname}}</td>
                    <td class="text-center vertical">
                        <span class="badge badge-lg" style="background-color: {{ $row->color }}">
                            {{$row->status}}
                        </span>
                        <br>
                        {{$row->timestart}} - {{$row->timeend}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row mt-3">
        <div class="col-xs-8" align="left">
            <ul class="list-unstyled">
                <li>{{ $datasum['partya'] }}: {{ $datasum['sitename'] }}</li>
                <li>{{ $datasum['datetime'] }}:</li>
            </ul>
        </div>
        <div class="col-xs-4" align="left">
            <ul class="list-unstyled">
                <li>{{ $datasum['partyb'] }}: {{ $datasum['companyname'] }}</li>
                <li>{{ $datasum['represented'] }}: {{ $datasum['uname'] }}</li>
                <li>{{ $datasum['datetime'] }}:</li>
            </ul>
            
        </div>       
    </div>
</div>
@endsection
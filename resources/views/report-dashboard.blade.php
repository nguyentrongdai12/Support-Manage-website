@extends('voyager::master')

@section('content')
    <div class="clearfix container-fluid row">
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="card widget center">
                <div class="card-body">
                    <h3 class="card-title">Report daily task</h3>
                    <p class="card-text">Select Site, User, and date to export report daily task.</p>
                    {!! Form::open(['action' => 'App\Http\Controllers\Cdbcontroller@getreport', 'method' => 'GET']) !!}
                    <div class="form-group">
                        {{ Form::label('lang', 'Language:'); }}                       
                        {{ Form::select('lang', ['en' => 'English', 'vi' =>  'Tiếng Việt'] , 'en', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('selectsite', 'Sites:'); }}                       
                        {{ Form::select('selectsite', $listsite->pluck('sitecode', 'id'), $listsite->pluck('sitecode'), ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('uname', 'User:'); }}
                        {{ Form::text('uname', $uname, ['class' => 'form-control', 'readonly']); }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('fromdate', 'From:'); }}
                        {{ Form::date('fromdate','',['class' => 'form-control', 'required']); }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('enddate', 'To:'); }}
                        {{ Form::date('enddate','',['class' => 'form-control', 'required']); }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('View report', ['class' => 'btn btn-primary']) }}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
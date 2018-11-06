@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div id="changeGrid" class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Car List</b></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-md-6 col-md-offset-3">
                            <select class="form-control" id="years">
                                @if(!$_GET || $_GET['year']=='All')
                                <option value="All" id="clall" selected>All</option>
                                <option value="2015" id="cl2015">2015</option>
                                <option value="2016" id="cl2016">2016</option>
                                <option value="2017" id="cl2017">2017</option>
                                <option value="2018" id="cl2018">2018</option>
                                @elseif($_GET['year']=='2015')
                                <option value="All" id="clall">All</option>
                                <option value="2015" id="cl2015" selected>2015</option>
                                <option value="2016" id="cl2016">2016</option>
                                <option value="2017" id="cl2017">2017</option>
                                <option value="2018" id="cl2018">2018</option>
                                @elseif($_GET['year']=='2016')
                                <option value="All" id="clall">All</option>
                                <option value="2015" id="cl2015">2015</option>
                                <option value="2016" id="cl2016" selected>2016</option>
                                <option value="2017" id="cl2017">2017</option>
                                <option value="2018" id="cl2018">2018</option>
                                @elseif($_GET['year']=='2017')
                                <option value="All" id="clall">All</option>
                                <option value="2015" id="cl2015">2015</option>
                                <option value="2016" id="cl2016">2016</option>
                                <option value="2017" id="cl2017" selected>2017</option>
                                <option value="2018" id="cl2018">2018</option>
                                @elseif($_GET['year']=='2018')
                                <option value="All" id="clall">All</option>
                                <option value="2015" id="cl2015">2015</option>
                                <option value="2016" id="cl2016">2016</option>
                                <option value="2017" id="cl2017">2017</option>
                                <option value="2018" id="cl2018" selected>2018</option>
                                @endif
                            </select>    
                        </div>
                    </div>

                    <div class="row">
                    @for ($i = 0; $i < count($cars); $i++)
                        @foreach ($cars->get($i)->carprice as $car)
                                @if(!$_GET || $_GET['year']=='All')
                                <div id="{{ $car->year }}_{{ $cars->get($i)->short_name }}" class="col-md-3 col-sm-4 col-xs-6">
                                @elseif($_GET['year']==$car->year)
                                <div id="{{ $car->year }}_{{ $cars->get($i)->short_name }}" class="col-md-3 col-sm-4 col-xs-6">
                                @else
                                <div id="{{ $car->year }}_{{ $cars->get($i)->short_name }}" class="col-md-3 col-sm-4 col-xs-6" style="display: none">
                                @endif
                                @if(isset($compareDetail))
                                    @if($_GET)
                                        @if($_GET['year']==$car->year)
                                        <a class="changeYear" href="{{ url('/home/detail') }}/{{$cars->get($i)->id}}/{{$car->id}}/compare/{{$compareDetail->id}}/{{$comparePriceDetail->id}}?year={{ $car->year }}" style="text-decoration: none; cursor: pointer">
                                        @else
                                        <a class="changeYear" href="{{ url('/home/detail') }}/{{$cars->get($i)->id}}/{{$car->id}}/compare/{{$compareDetail->id}}/{{$comparePriceDetail->id}}" style="text-decoration: none; cursor: pointer">
                                        @endif
                                    @else
                                    <a class="changeYear" href="{{ url('/home/detail') }}/{{$cars->get($i)->id}}/{{$car->id}}/compare/{{$compareDetail->id}}/{{$comparePriceDetail->id}}" style="text-decoration: none; cursor: pointer">
                                    @endif
                                        @if(isset($carDetail))
                                            @if ($cars->get($i)->id==$compareDetail->id && $car->id==$comparePriceDetail->id)
                                            <div class="panel panel-default">
                                                <div id="chosen" class="panel-body" style="background-color: #fcf8e3">
                                                    <h5>{{ $car->year }} {{ $cars->get($i)->name }}</h5>
                                                    <h4>RM {{ number_format($car->price) }}</h4>
                                                </div>
                                            </div>
                                            @elseif ($cars->get($i)->id==$carDetail->id && $car->id==$carPriceDetail->id)
                                            <div class="panel panel-default">
                                                <div id="chosen" class="panel-body" style="background-color: #d9edf7">
                                                    <h5>{{ $car->year }} {{ $cars->get($i)->name }}</h5>
                                                    <h4>RM {{ number_format($car->price) }}</h4>
                                                </div>
                                            </div>
                                            @else
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <h5>{{ $car->year }} {{ $cars->get($i)->name }}</h5>
                                                    <h4>RM {{ number_format($car->price) }}</h4>
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <h5>{{ $car->year }} {{ $cars->get($i)->name }}</h5>
                                                <h4>RM {{ number_format($car->price) }}</h4>
                                            </div>
                                        </div>  
                                        @endif
                                    </a>
                                @else
                                    @if($_GET)
                                        @if($_GET['year']==$car->year)
                                        <a class="changeYear" href="{{ url('/home/detail') }}/{{$cars->get($i)->id}}/{{$car->id}}?year={{ $car->year }}" style="text-decoration: none; cursor: pointer">
                                        @else
                                        <a class="changeYear" href="{{ url('/home/detail') }}/{{$cars->get($i)->id}}/{{$car->id}}" style="text-decoration: none; cursor: pointer">
                                        @endif
                                    @else
                                    <a class="changeYear" href="{{ url('/home/detail') }}/{{$cars->get($i)->id}}/{{$car->id}}" style="text-decoration: none; cursor: pointer">
                                    @endif
                                        @if(isset($carDetail))
                                            @if ($cars->get($i)->id==$carDetail->id && $car->id==$carPriceDetail->id)
                                            <div class="panel panel-default">
                                                <div id="chosen" class="panel-body" style="background-color: #d9edf7">
                                                    <h5>{{ $car->year }} {{ $cars->get($i)->name }}</h5>
                                                    <h4>RM {{ number_format($car->price) }}</h4>
                                                </div>
                                            </div>
                                            @else
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <h5>{{ $car->year }} {{ $cars->get($i)->name }}</h5>
                                                    <h4>RM {{ number_format($car->price) }}</h4>
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <h5>{{ $car->year }} {{ $cars->get($i)->name }}</h5>
                                                <h4>RM {{ number_format($car->price) }}</h4>
                                            </div>
                                        </div>  
                                        @endif
                                    </a> 
                                @endif
                                </div>
                        @endforeach
                    @endfor
                    </div>
                </div>
            </div>
        </div>
        @if(isset($carDetail))
        <div id="compareDiv" class="col-md-4">
            <div class="panel panel-default">
                @if(isset($compareDetail))
                    <div class="panel-body">
                        <h4>Car Details</h4>
                        <table class="table table-sm" style="margin-bottom:5px;">
                            <tbody>   
                                <tr>
                                    <td class="warning"><h5 style="margin: 0px;"><b>Name</b></h5></td>
                                    <td class="active"><h5 style="margin: 0px;">{{ $comparePriceDetail->year }} {{ $compareDetail->name }}</h5></td>
                                </tr>
                                <tr>
                                    <td class="warning"><h5 style="margin: 0px;"><b>Trasmition</b></h5></td>
                                    <td class="active"><h5 style="margin: 0px;">{{ $compareDetail->transmition }}</h5></td>
                                </tr>
                                <tr>
                                    <td class="warning"><h5 style="margin: 0px;"><b>Engine<br>Capacity</b></h5></td>
                                    <td class="active"><h5 style="margin: 0px;">{{ $compareDetail->engine_capacity }}</h5></td>
                                </tr>
                                <tr>
                                    <td class="warning"><h5 style="margin: 0px;"><b>Seats</b></h5></td>
                                    <td class="active"><h5 style="margin: 0px;">{{ $compareDetail->seats }}</h5></td>
                                </tr>
                                <tr>
                                    <td class="warning"><h5 style="margin: 0px;"><b>Year</b></h5></td>
                                    <td class="active"><h5 style="margin: 0px;">{{ $comparePriceDetail->year }}</h5></td>
                                </tr>
                                <tr>
                                    <td class="warning"><h5 style="margin: 0px;"><b>Price</b></h5></td>
                                    <td class="active"><h5 style="margin: 0px;">RM {{ number_format($comparePriceDetail->price) }}</h5></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr style="margin-top:0px; margin-bottom:5px;">
                        <table class="table table-sm" style="margin-bottom:5px;">
                            <tbody>   
                                <tr>
                                    <td class="info">
                                        <h5 style="margin: 0px;"><b>Name</b></h5>
                                    </td>
                                    <td class="active">
                                        <h5 style="margin: 0px;">{{ $carPriceDetail->year }} {{ $carDetail->name }}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info">
                                        <h5 style="margin: 0px;"><b>Trasmition</b></h5>
                                    </td>
                                    <td class="active">
                                        <h5 style="margin: 0px;">{{ $carDetail->transmition }}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info">
                                        <h5 style="margin: 0px;"><b>Engine<br>Capacity</b></h5>
                                    </td>
                                    <td class="active">
                                        @php
                                            $capacity = (int) str_replace(' cc', '', $carDetail->engine_capacity);
                                            $capacityComp = (int) str_replace(' cc', '', $compareDetail->engine_capacity);
                                        @endphp
                                        @if ($capacity < $capacityComp)
                                        <h5 style="margin: 0px; color: #ff4000;">{{ $capacity.' cc' }}</h5>
                                        @elseif ($capacity == $capacityComp)
                                        <h5 style="margin: 0px; color: #cccc00;">{{ $capacity.' cc' }}</h5>
                                        @elseif ($capacity > $capacityComp)
                                        <h5 style="margin: 0px; color: #33cc00;">{{ $capacity.' cc' }}</h5>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info">
                                        <h5 style="margin: 0px;"><b>Seats</b></h5>
                                    </td>
                                    <td class="active">
                                        @if ($carDetail->seats < $compareDetail->seats)
                                        <h5 style="margin: 0px; color: #ff4000;">{{ $carDetail->seats }}</h5>
                                        @elseif ($carDetail->seats == $compareDetail->seats)
                                        <h5 style="margin: 0px; color: #cccc00;">{{ $carDetail->seats }}</h5>
                                        @elseif ($carDetail->seats > $compareDetail->seats)
                                        <h5 style="margin: 0px; color: #33cc00;">{{ $carDetail->seats }}</h5>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info">
                                        <h5 style="margin: 0px;"><b>Year</b></h5>
                                    </td>
                                    <td class="active">
                                        @if ($carPriceDetail->year < $comparePriceDetail->year)
                                        <h5 style="margin: 0px; color: #ff4000;">{{ $carPriceDetail->year }}</h5>
                                        @elseif ($carPriceDetail->year == $comparePriceDetail->year)
                                        <h5 style="margin: 0px; color: #cccc00;">{{ $carPriceDetail->year }}</h5>
                                        @elseif ($carPriceDetail->year > $comparePriceDetail->year)
                                        <h5 style="margin: 0px; color: #33cc00;">{{ $carPriceDetail->year }}</h5>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="info">
                                        <h5 style="margin: 0px;"><b>Price</b></h5>
                                    </td>
                                    <td class="active">
                                        @if ($carPriceDetail->price > $comparePriceDetail->price)
                                        <h5 style="margin: 0px; color: #ff4000;">RM {{ number_format($carPriceDetail->price) }}</h5>
                                        @elseif ($carPriceDetail->price == $comparePriceDetail->price)
                                        <h5 style="margin: 0px; color: #cccc00;">RM {{ number_format($carPriceDetail->price) }}</h5>
                                        @elseif ($carPriceDetail->price < $comparePriceDetail->price)
                                        <h5 style="margin: 0px; color: #33cc00;">RM {{ number_format($carPriceDetail->price) }}</h5>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url('/home/detail') }}/{{$carDetail->id}}/{{$carPriceDetail->id}}" type="button" class="btn btn-block btn-sm btn-danger">Remove Comparison</a>
                        <h6><b>Comparison Format</b></h6>
                        <h6 style="margin: 0px; color: #33cc00;">More Capacity, More Seating, Newer, Cheaper</h6>
                        <h6 style="margin: 0px; color: #cccc00;">Same</h6>
                        <h6 style="margin: 0px; color: #ff4000;">Less Capacity, Less Seating, Older, Expensive</h6>
                    </div>
                @else
                    <div class="panel-body">
                        <h4>Car Details</h4>
                        <table class="table table-sm" style="margin-bottom:5px;">
                            <tbody>   
                                <tr>
                                    <td class="info"><b>Name</b></td>
                                    <td class="active">{{ $carPriceDetail->year }} {{ $carDetail->name }}</td>
                                </tr>
                                <tr>
                                    <td class="info"><b>Trasmition</b></td>
                                    <td class="active">{{ $carDetail->transmition }}</td>
                                </tr>
                                <tr>
                                    <td class="info"><b>Engine<br>Capacity</b></td>
                                    <td class="active">{{ $carDetail->engine_capacity }}</td>
                                </tr>
                                <tr>
                                    <td class="info"><b>Seats</b></td>
                                    <td class="active">{{ $carDetail->seats }}</td>
                                </tr>
                                <tr>
                                    <td class="info"><b>Year</b></td>
                                    <td class="active">{{ $carPriceDetail->year }}</td>
                                </tr>
                                <tr>
                                    <td class="info"><b>Price</b></td>
                                    <td class="active">RM {{ number_format($carPriceDetail->price) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ url('/home/detail') }}/{{$carDetail->id}}/{{$carPriceDetail->id}}/compare/{{$carDetail->id}}/{{$carPriceDetail->id}}" type="button" class="btn btn-block btn-sm btn-primary">Compare</a>
                    </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endsection



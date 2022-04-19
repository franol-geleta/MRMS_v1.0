{{--
======================================================================
             Designed by:    Eyasu Girma [Kiya]
                 Mobile:     +251-913-078-029
                 Email:      sendtokiya@gmail.com
                 Facebook:   https://facebook.com/JoshKiyakoo
                 LinkedIn:   https://linkedin.com/in/JoshKiyakoo
                 Twitter:    https://twitter.com/JoshKiyakoo
                 GitHub:     https://github.com/JoshKiyakoo
                 Telegram:   https://t.me/JoshKiyakoo
======================================================================
--}}
@php use App\Models\Fellowships\FellowshipsDataModel; @endphp
@extends('layouts.mrmsMainLayout')
@section('myPageTitle', 'የህብረቶች ዝርዝር | Fellowships\' Cataloge')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Fellowships') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-9">
                    <h4 class="page-title">{{ __('የህብረቶች ዝርዝር | Fellowships\' Cataloge') }}</h4>
                </div>
                <div class="col-3 text-right">
                    <a href="{{ route ('fellowships.create') }}" class="btn btn-danger float-right btn-rounded"><i class="fa fa-user-plus">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Add New Fellowship') }}</strong></a>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group form-focus">
                        <label class="focus-label">{{ __('የህብረቶች መፈለጊያ | Search Fellowships') }}</label>
                        <input type="text" class="form-control floating" placeholder="የህብረቱ ስም | Fellowship's Name">
                    </div>
                </div>
                <div class="col-md-2 filter-row">
                    <a href="#" class="btn btn-success btn-block"> <strong>{{ __('ፈልግ | Search') }}</strong> </a><br />
                </div>
                <div class="col-md-5 filter-row">
                    <div class="col-md-12">
                        {{-- Export-Spreadsheet-CSV --}}
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Comma Delimited Text (*.csv) file" href="{{ route ('fellowships.tocsv') }}" class="btn btn-secondary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to CSV (Comma Delimited Spreedsheet) format?');"><i class="fa fa-file-text-o">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('csv') }}</strong></a>
                    </div>
                    <div class="col-md-12">
                        {{-- Export-Spreadsheet-XLXS --}}
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Spreadsheet Format (*.xlxs | *.ods) file" href="{{ route ('fellowships.toexcel') }}" class="btn btn-warning float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to EXCEL (MS-Excel Spreedsheet) format?');"><i class="fa fa-file-excel-o">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Excel') }}</strong></a>
                    </div>
                    <div class="col-md-12">
                        {{-- Export-PortableFile-PDF --}}
                        {{-- route ('fellowships.topdf') --}}
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Portable Document Format (*.pdf) file" href="#" class="btn btn-primary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to PDF (Portable Document File) format?');"><i class="fa fa-file-pdf-o">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('pdf') }}</strong></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $fellowshipCount = DB::table('sfgbc_Fellowships')->count(); @endphp {{ $fellowshipCount }}
                            </h3>
                            <span class="widget-title1">Fellowships<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-map-signs" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $typeFellowshipCount = FellowshipsDataModel::distinct('fellowshipType')->count('fellowshipType'); @endphp {{ $typeFellowshipCount }}
                            </h3>
                            <span class="widget-title2">Type<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-arrows"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>
                                @php $zoneFellowshipCount = FellowshipsDataModel::distinct('fellowshipZone')->count('fellowshipZone'); @endphp {{ $zoneFellowshipCount }}
                            </h3>
                            <span class="widget-title4">Zone<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3> 
                                @php $inactiveFellowshipCount = FellowshipsDataModel::where('fellowshipStatus', 'Inactive')->count(); @endphp {{ $inactiveFellowshipCount }}
                            </h3>
                            <span class="widget-title3">Inactive<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <!--	NOTIFICATION MESSAGE	    -->
            @if (Session::get('JoshKiyakoo_Success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {!! html_entity_decode (Session::get('JoshKiyakoo_Success')) !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif(Session::get('JoshKiyakoo_Error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {!! html_entity_decode (Session::get('JoshKiyakoo_Error')) !!}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                                {{-- Data Table Headers --}}
                                <tr>
                                    <th class="text-center" style="min-width: 10px;">{{ __('#') }}</th>
                                    <th style="min-width: 100px;">{{ __('Fellowship ID') }}</th>
                                    <th style="min-width: 150px;">{{ __('Fellowship Type') }}</th>
                                    <th style="min-width: 150px;">{{ __('Fellowship Label') }}</th>
                                    <th style="min-width: 150px;">{{ __('Day Held On') }}</th>
                                    <th style="min-width: 150px;">{{ __('Fellowship Time') }}</th>
                                    <th style="min-width: 150px;">{{ __('Fellowship Zone') }}</th>
                                    <th style="min-width: 100px;">{{ __('Status') }}</th>
                                    <th style="min-width: 150px;">{{ __('Location Owner') }}</th>
                                    <th style="min-width: 250px;">{{ __('Location Naming') }}</th>
                                    <th style="min-width: 150px;">{{ __('Estabilished On') }}</th>
                                    <th style="min-width: 120px;">{{ __('Is Restructured') }}</th>
                                    <th style="min-width: 150px;">{{ __('Restructure Type') }}</th>
                                    <th style="min-width: 150px;">{{ __('Restructured On') }}</th>
                                    <th style="min-width: 220px;">{{ __('Restructured To Fellowship') }}</th>
                                    <th style="min-width: 200px;">{{ __('Restructure Reason') }}</th>
                                    <th style="min-width: 250px;">{{ __('Remark') }}</th>
                                    <th class="text-center" style="min-width: 155px;">{{ __('Action ( # )') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fellowships as $data => $fellowship)
                                    <tr>
                                        {{-- Action Buttons --}}
                                        <td class="text-right">
                                            <div data-toggle="tooltip" data-placement="right" title="Action Key" class="dropdown dropdown-action">
                                                <a href="#" class="btn-sm btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route ('fellowships.show', $fellowship->idFellowship) }}"><i class="btn-sm btn btn-success fa fa-desktop"></i> {{ __('Show') }}</a>
                                                    @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                        <a class="dropdown-item" href="{{ route ('fellowships.edit', $fellowship->idFellowship) }}" onClick="return confirmEdit('Are you SURE to EDIT this member\'s data?');"><i class="btn-sm btn btn-warning fa fa-edit"></i> {{ __('Edit') }}</a>
                                                    @endif
                                                    @if (Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active')
                                                        <a class="dropdown-item" href="{{ route ('fellowships.remove', $fellowship->idFellowship) }}" onClick="return confirmDelete('Are you SURE to DELETE this member\'s data?');"><i class="btn-sm btn btn-danger fa fa-trash"></i> {{ __('Delete') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        {{-- Resultset Data Tables  --}}
                                        <td>
                                            @if ($fellowship->idFellowship < 10) @php $zeroFillID = '0000000'.$fellowship->idFellowship; @endphp
                                            @elseif ($fellowship->idFellowship < 100) @php $zeroFillID = '000000'.$fellowship->idFellowship; @endphp
                                            @elseif ($fellowship->idFellowship < 1000) @php $zeroFillID = '00000'.$fellowship->idFellowship; @endphp
                                            @elseif ($fellowship->idFellowship < 10000) @php $zeroFillID = '0000'.$fellowship->idFellowship; @endphp
                                            @elseif ($fellowship->idFellowship < 10000) @php $zeroFillID = '000'.$fellowship->idFellowship; @endphp
                                            @elseif ($fellowship->idFellowship < 100000) @php $zeroFillID = '00'.$fellowship->idFellowship; @endphp
                                            @elseif ($fellowship->idFellowship < 1000000) @php $zeroFillID = '0'.$fellowship->idFellowship; @endphp
                                            @else @php $zeroFillID = $fellowship->idFellowship; @endphp @endif
                                            {{ $zeroFillID }}
                                        </td>
                                        <td><h2>{{ $fellowship->fellowshipType }}</h2></td>
                                        <td><h2>{{ $fellowship->fellowshipLabel }}</h2></td>
                                        <td>{{ $fellowship->dayHeldOn }}</td>
                                        <td>{{ $fellowship->startTime. ' - ' .$fellowship->endTime }}</td>
                                        <td>{{ $fellowship->fellowshipZone }}</td>
                                        <td>
                                            @if ($fellowship->fellowshipStatus === 'Active') <span class="custom-badge status-green">{{ $fellowship->fellowshipStatus }}</span>
                                            @else <span class="custom-badge status-red">{{ $fellowship->fellowshipStatus }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $fellowship->locationOwner }}</td>
                                        <td>{{ Str::of($fellowship->locationNaming)->substr(0, 39)->append('...') }}</td>
                                        <td>{{ $fellowship->estabilishedDate }}</td>
                                        <td>{{ $fellowship->isRestructured }}</td>
                                        <td>{{ $fellowship->restructureType }}</td>
                                        <td>{{ $fellowship->restructuredDate }}</td>
                                        <td>{{ $fellowship->restructuredToFellowship }}</td>
                                        <td>{{ Str::of($fellowship->restructureReason)->substr(0, 39)->append('...') }}</td>
                                        <td>{{ Str::of($fellowship->fellowshipRemark)->substr(0, 39)->append('...') }}</td>

                                        {{-- Action Buttons --}}
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="top" title="Show" class="btn-sm btn btn-success fa fa-desktop" href="{{ route ('fellowships.show', $fellowship->idFellowship) }}"></a>
                                            @if ((Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Editor') && Auth::user()->status == 'Active')
                                                <a data-toggle="tooltip" data-placement="top" title="Edit" class="btn-sm btn btn-warning fa fa-edit" href="{{ route ('fellowships.edit', $fellowship->idFellowship) }}" onClick="return confirmEdit('Are you SURE to EDIT this member\'s data?');"></a>
                                            @endif
                                            @if (Auth::user()->role == 'Super Admin' && Auth::user()->status == 'Active')
                                                <a data-toggle="tooltip" data-placement="top" title="Delete" class="btn-sm btn btn-danger fa fa-trash" href="{{ route ('fellowships.remove', $fellowship->idFellowship) }}" data-toggle="modal" onClick="return confirmDelete('Are you SURE to DELETE this member\'s data?');"></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $.confirmEdit ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });

        $.confirmDelete ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });
        
        $.confirmDeactivate ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });
        
        $.excelFileExport ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });
        
        $.csvFileExport ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });
        
        $.pdfFileExport ({
            title : 'Confirm!' ,
            // content : 'confirm!' ,
            confirm : function (){
                alert ( 'Operation Confirmed!' );
            },
            cancel : function (){
                alert ( 'Operation Canceled!' );
            }
        });
    </script>
@endsection

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
@php use App\Models\Members\MembersDataModel; @endphp
@extends('layouts.mrmsMainLayout')
@section('myPageTitle', 'የክሰሙ አባላት ዝርዝር | Deactivated Members\' Cataloge')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('All Inactive Members') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="page-title">{{ __('የክሰሙ አባላት ዝርዝር | Deactivated Members\' Cataloge') }}</h4>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-7">
                    <form action="" method="" id="" name="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group form-focus">
                                    <label class="focus-label">{{ __('የአባላት መፈለጊያ | Search Members') }}</label>
                                    <input type="text" name="txtSearchMember" id="iSearchMember" class="form-control floating" placeholder="የአባሉ ስም | Member's Name">
                                </div>
                            </div>
                            <div class="col-md-4 filter-row">
                                <a href="#" class="btn btn-success btn-block"> <strong>{{ __('ፈልግ | Search') }}</strong> </a><br />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 filter-row">
                    <div class="col-md-12">
                        {{-- Export-Spreadsheet-CSV --}}
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Comma Delimited Text (*.csv) file" href="{{ route ('members.tocsv') }}" class="btn btn-secondary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to CSV (Comma Delimited Spreedsheet) format?');"><i class="fa fa-file-text-o">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('csv') }}</strong></a>
                    </div>
                    <div class="col-md-12">
                        {{-- Export-Spreadsheet-XLXS --}}
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Spreadsheet Format (*.xlxs | *.ods) file" href="{{ route ('members.toexcel') }}" class="btn btn-warning float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to EXCEL (MS-Excel Spreedsheet) format?');"><i class="fa fa-file-excel-o">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('Excel') }}</strong></a>
                    </div>
                    <div class="col-md-12">
                        {{-- Export-PortableFile-PDF --}} 
                        <a data-toggle="tooltip" data-placement="bottom" title="Export as Portable Document Format (*.pdf) file" href="#" class="btn btn-primary float-right btn-rounded" onClick="return confirm ('Are you SURE to EXPORT current data to PDF (Portable Document File) format?');"><i class="fa fa-file-pdf-o">&nbsp;&nbsp;&nbsp;</i><strong>{{ __('pdf') }}</strong></a>
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
                                    <th style="min-width: 100px;">{{ __('Deactivated #') }}</th>
                                    <th style="min-width: 150px;">{{ __('Member ID') }}</th>
                                    <th class="wrap" style="min-width: 400px;">{{ __('Photo || Full Name') }}</th>
                                    <th style="min-width: 25px;">{{ __('Gender') }}</th>
                                    <th style="min-width: 100px;">{{ __('Status') }}</th>
                                    <th style="min-width: 150px;">{{ __('Civil Status') }}</th>
                                    <th style="min-width: 100px;">{{ __('Phone Number') }}</th>
                                    <th style="min-width: 150px;">{{ __('Email') }}</th>
                                    <th style="min-width: 100px;">{{ __('Birth Date') }}</th>

                                    <th style="min-width: 100px;">{{ __('Transfer Letter No.') }}</th>
                                    <th style="min-width: 150px;">{{ __('Transfer Type') }}</th>
                                    <th style="min-width: 120px;">{{ __('Transfer Date') }}</th>
                                    <th style="min-width: 200px;">{{ __('Transfer to Church') }}</th>
                                    <th style="min-width: 120px;">{{ __('Transfer Location') }}</th>

                                    <th style="min-width: 150px;">{{ __('Decease Date') }}</th>
                                    <th style="min-width: 200px;">{{ __('Decease Reason') }}</th>
                                    <th style="min-width: 100px;">{{ __('Who Notified') }}</th>
                                    <th style="min-width: 150px;">{{ __('Relationship with Deceased') }}</th>
                                    <th style="min-width: 120px;">{{ __('Funeral Place') }}</th>
                                    <th style="min-width: 120px;">{{ __('Funeral Date') }}</th>
                                    <th style="min-width: 120px;">{{ __('Funeral Time') }}</th>
                                    <th style="min-width: 100px;">{{ __('Funeral Coordinator') }}</th>

                                    <th class="text-center" style="min-width: 155px;">{{ __('Action ( # )') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $dataCounter = 0; @endphp
                                @foreach($inactiveMembers as $data => $inactiveMember)
                                    <tr>
                                        {{-- Action Buttons --}}
                                        <td class="text-right">
                                            <div data-toggle="tooltip" data-placement="right" title="Action Key" class="dropdown dropdown-action">
                                                <a href="#" class="btn-sm btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route ('members.show', $inactiveMember->idMember) }}"><i class="btn-sm btn btn-success fa fa-desktop"></i> {{ __('Show') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- Resultset Data Tables  --}}
                                        <td>{{ ++$dataCounter }}</td>
                                        <td>
                                            @php $idPrefix = $inactiveMember->prefix; @endphp
                                                @if ($inactiveMember->idMember < 10) @php $zeroFillID = '0000000'.$inactiveMember->idMember; @endphp
                                                @elseif ($inactiveMember->idMember < 100) @php $zeroFillID = '000000'.$inactiveMember->idMember; @endphp
                                                @elseif ($inactiveMember->idMember < 1000) @php $zeroFillID = '00000'.$inactiveMember->idMember; @endphp
                                                @elseif ($inactiveMember->idMember < 10000) @php $zeroFillID = '0000'.$inactiveMember->idMember; @endphp
                                                @elseif ($inactiveMember->idMember < 10000) @php $zeroFillID = '000'.$inactiveMember->idMember; @endphp
                                                @elseif ($inactiveMember->idMember < 100000) @php $zeroFillID = '00'.$inactiveMember->idMember; @endphp
                                                @elseif ($inactiveMember->idMember < 1000000) @php $zeroFillID = '0'.$inactiveMember->idMember; @endphp
                                                @else @php $zeroFillID = $inactiveMember->idMember; @endphp @endif
                                            @php $idSuffix = $inactiveMember->suffix; @endphp
                                            
                                            {{ $idPrefix.$zeroFillID.$idSuffix }}
                                        </td>
                                        <td>
                                            <img width="30" height="30" src="{{ URL::to($inactiveMember->photograph) }}" class="rounded-circle" alt="|_No.Member.Photo_|">
                                            <h2>{{ $inactiveMember->appellation.' '.$inactiveMember->firstName.' '.$inactiveMember->middleName.' '.$inactiveMember->lastName }} </h2>
                                        </td>
                                        <td>{{ $inactiveMember->gender }}</td>
                                        <td>
                                            @if ($inactiveMember->status === 'Active') <span class="custom-badge status-green">{{ $inactiveMember->status }}</span>
                                            @else <span class="custom-badge status-red">{{ $inactiveMember->status }}</span>
                                            @endif
                                        </td>

                                        <td>{{ $inactiveMember->civilStatus }}</td>
                                        <td>{{ $inactiveMember->primaryPhone }}</td>
                                        <td>{{ $inactiveMember->email }}</td>
                                        <td>{{ $inactiveMember->birthDate }}</td>

                                        <td>{{ $inactiveMember->transferLetterNum }}</td>
                                        <td>{{ $inactiveMember->transferType }}</td>
                                        <td>{{ $inactiveMember->transferDate }}</td>
                                        <td>{{ $inactiveMember->churchTransfer }}</td>
                                        <td>{{ $inactiveMember->transferLocation }}</td>

                                        <td>{{ $inactiveMember->deceaseDate }}</td>
                                        <td>{{ $inactiveMember->deceaseReason }}</td>
                                        <td>{{ $inactiveMember->whoNotified }}</td>
                                        <td>{{ $inactiveMember->deceaseRelationship }}</td>
                                        <td>{{ $inactiveMember->funeralPlace }}</td>
                                        <td>{{ $inactiveMember->funeralDate }}</td>
                                        <td>{{ $inactiveMember->funeralTime }}</td>
                                        <td>{{ $inactiveMember->funeralCoordinator }}</td>
                                        
                                        {{-- Action Buttons --}}
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="top" title="Show" class="btn-sm btn btn-success fa fa-desktop" href="{{ URL::to ('members/show', $inactiveMember->idMember) }}"></a>
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
        //
    </script>
@endsection

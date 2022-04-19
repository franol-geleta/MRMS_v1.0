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
@section('myPageTitle', 'የተዘዋወሩ አባላት ዝርዝር | Transfered Members\' Cataloge')
@section('MainContent')
    <div class="page-wrapper">
        <div class="content">
            <div style="text-align: right;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route ('dashboard') }}"><i class="fa fa-home">&nbsp;&nbsp;</i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route ('members.index') }}">{{ __('Members') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('All Transfered Members') }}</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4 class="page-title">{{ __('የተዘዋወሩ አባላት ዝርዝር | Transfered Members\' Cataloge') }}</h4>
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
                        {{-- {{ route ('members.topdf') }} --}}
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
                                    <th style="min-width: 150px;">{{ __('Transfer ID') }}</th>
                                    <th style="min-width: 150px;">{{ __('Member ID') }}</th>
                                    <th class="wrap" style="min-width: 400px;">{{ __('Photo || Full Name') }}</th>
                                    <th style="min-width: 25px;">{{ __('Gender') }}</th>
                                    <th style="min-width: 100px;">{{ __('Status') }}</th>
                                    <th style="min-width: 150px;">{{ __('Civil Status') }}</th>
                                    <th style="min-width: 100px;">{{ __('Birth Date') }}</th>
                                    <th style="min-width: 100px;">{{ __('Transfer Letter No.') }}</th>
                                    <th style="min-width: 150px;">{{ __('Transfer Type') }}</th>
                                    <th style="min-width: 120px;">{{ __('Transfer Date') }}</th>
                                    <th style="min-width: 200px;">{{ __('Transfer to Church') }}</th>
                                    <th style="min-width: 120px;">{{ __('Transfer Location') }}</th>
                                    <th style="min-width: 200px;">{{ __('Transfer Remark') }}</th>
                                    <th class="text-center" style="min-width: 155px;">{{ __('Action ( # )') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transferedMembers as $data => $transferedMember)
                                    <tr>
                                        {{-- Action Buttons --}}
                                        <td class="text-right">
                                            <div data-toggle="tooltip" data-placement="right" title="Action Key" class="dropdown dropdown-action">
                                                <a href="#" class="btn-sm btn btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="{{ route ('members.show', $transferedMember->idMember) }}"><i class="btn-sm btn btn-success fa fa-desktop"></i> {{ __('Show') }}</a>
                                                </div>
                                            </div>
                                        </td>
                                        {{-- Resultset Data Tables  --}}
                                        <td>
                                            @if ($transferedMember->idTransferedMemberData < 10) @php $inactiveZeroFillID = '0000000'.$transferedMember->idTransferedMemberData; @endphp
                                            @elseif ($transferedMember->idTransferedMemberData < 100) @php $inactiveZeroFillID = '000000'.$transferedMember->idTransferedMemberData; @endphp
                                            @elseif ($transferedMember->idTransferedMemberData < 1000) @php $inactiveZeroFillID = '00000'.$transferedMember->idTransferedMemberData; @endphp
                                            @elseif ($transferedMember->idTransferedMemberData < 10000) @php $inactiveZeroFillID = '0000'.$transferedMember->idTransferedMemberData; @endphp
                                            @elseif ($transferedMember->idTransferedMemberData < 10000) @php $inactiveZeroFillID = '000'.$transferedMember->idTransferedMemberData; @endphp
                                            @elseif ($transferedMember->idTransferedMemberData < 100000) @php $inactiveZeroFillID = '00'.$transferedMember->idTransferedMemberData; @endphp
                                            @elseif ($transferedMember->idTransferedMemberData < 1000000) @php $inactiveZeroFillID = '0'.$transferedMember->idTransferedMemberData; @endphp
                                            @else @php $inactiveZeroFillID = $transferedMember->idTransferedMemberData; @endphp @endif

                                            {{ $inactiveZeroFillID }}
                                        </td>
                                        <td>
                                            @php $idPrefix = $transferedMember->prefix; @endphp
                                                @if ($transferedMember->idMember < 10) @php $zeroFillID = '0000000'.$transferedMember->idMember; @endphp
                                                @elseif ($transferedMember->idMember < 100) @php $zeroFillID = '000000'.$transferedMember->idMember; @endphp
                                                @elseif ($transferedMember->idMember < 1000) @php $zeroFillID = '00000'.$transferedMember->idMember; @endphp
                                                @elseif ($transferedMember->idMember < 10000) @php $zeroFillID = '0000'.$transferedMember->idMember; @endphp
                                                @elseif ($transferedMember->idMember < 10000) @php $zeroFillID = '000'.$transferedMember->idMember; @endphp
                                                @elseif ($transferedMember->idMember < 100000) @php $zeroFillID = '00'.$transferedMember->idMember; @endphp
                                                @elseif ($transferedMember->idMember < 1000000) @php $zeroFillID = '0'.$transferedMember->idMember; @endphp
                                                @else @php $zeroFillID = $transferedMember->idMember; @endphp @endif
                                            @php $idSuffix = $transferedMember->suffix; @endphp
                                            
                                            {{ $idPrefix.$zeroFillID.$idSuffix }}
                                        </td>
                                        <td>
                                            <img width="30" height="30" src="{{ URL::to($transferedMember->photograph) }}" class="rounded-circle" alt="|_No.Member.Photo_|">
                                            <h2>{{ $transferedMember->appellation.' '.$transferedMember->firstName.' '.$transferedMember->middleName.' '.$transferedMember->lastName }} </h2>
                                        </td>
                                        <td>{{ $transferedMember->gender }}</td>
                                        <td>
                                            @if ($transferedMember->status === 'Active') <span class="custom-badge status-green">{{ $transferedMember->status }}</span>
                                            @else <span class="custom-badge status-red">{{ $transferedMember->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $transferedMember->civilStatus }}</td>
                                        <td>{{ $transferedMember->birthDate }}</td>
                                        <td>{{ $transferedMember->transferLetterNum }}</td>
                                        <td>{{ $transferedMember->transferType }}</td>
                                        <td>{{ $transferedMember->transferDate }}</td>
                                        <td>{{ $transferedMember->churchTransfer }}</td>
                                        <td>{{ $transferedMember->transferLocation }}</td>
                                        <td>{{ Str::of($transferedMember->transferRemark)->substr(0, 39)->append('...') }}</td>

                                        {{-- Action Buttons --}}
                                        <td class="text-right">
                                            <a data-toggle="tooltip" data-placement="top" title="Show" class="btn-sm btn btn-success fa fa-desktop" href="{{ URL::to ('members/show', $transferedMember->idMember) }}"></a>
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

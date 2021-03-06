
@extends('layouts.argon_template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-header">การจองเตียง</div>
                    <div class="card-body">
                        <a href="{{ url('/reservationCreate') }}" class="btn btn-success btn-sm" title="เพิ่มใหม่">
                            <i class="fa fa-plus" aria-hidden="true"></i> เพิ่มข้อมูลจอง
                        </a>
                        <form method="GET" action="{{ url('/reservation') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="ค้นหา..." value="{{ request('ค้นหา') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ลำดับ</th><th>ชื่อวอร์ด</th><th>การดำเนินการ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reservation  as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <a href="{{ url('/reservation/' . $item->id) }}" title="View Post"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> ดู</button></a>
                                            <a href="{{ url('/reservation/' . $item->id . '/reservationEdit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไข</button></a>

                                            <form method="POST" action="{{ url('/reservation' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $reservation ->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

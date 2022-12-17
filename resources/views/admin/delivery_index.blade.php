@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh sách các phí vận chuyển
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>                
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo  $message;
                        session()->put('message', null);
                    }
                ?>
            <thead>
                <tr>
                <th style="width:20px;">
                    <label class="i-checks m-b-none">
                    <input type="checkbox"><i></i>
                    </label>
                </th>
                <th>STT</th>
                <th>Tên thành phố</th>
                <th>Tên quận huyện</th>
                <th>Tên xã phường</th>
                <th>Số tiền</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feeship as $key => $val)

                <tr>
                    <td><label class="i-checks m-b-none text-"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $val->city->name_tp }}</td>
                    <td>{{ $val->province->name_qh }}</td>
                    <td>{{ $val->wards->name_xa }}</td>
                    <td>{{ $val->fee_feeship }}</td>
                    <td>
                        <a href="{{URL::to('/delivery/delete/'.$val->fee_id)}}" onclick="return confirm('Bạn có chắc là xóa mã này?')" class="active link-icon-category" ui-toggle-class="">
                            <i class="fa fa-times text-danger"></i></a>
                    </td>
                </tr>

                @endforeach
            </tbody>
            </table>
        </div>
    <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
    </footer>
    </div>
  </div>

@endsection
<div class="tab-pane active" id="tab_1_1">
    {{--<form role="form" >--}}
    {!! Form::model($thongtincanhan, ['route' => ['nhanvien.profile.updateThongTinCaNhan', $thongtincanhan->id], 'method' => 'patch','enctype'=>'multipart/form-data']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label for="hoten" class="control-label"><strong>Họ và tên</strong></label>
        <input name="hoten" type="text" value='{{$thongtincanhan->hoten}}' class="form-control"/>
    </div>
    <div class="form-group">
        <label for="ngaysinh" class="control-label"><strong>Ngày sinh</strong></label>
        <input name="ngaysinh" class="form-control"  type="date" value="{{$thongtincanhan->ngaysinh}}">
    </div>
    <div class="form-group">
        <label><strong>Giới tính</strong></label>
        <div class="input-group">
            <div class="icheck-inline">
                @if($thongtincanhan->gioitinh=='1')
                    <label class="">
                        <div class="iradio_minimal-grey " style="position: relative;"><input value="1" type="radio" name="gioitinh" checked="" class="icheck" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Nam </label>
                    <label class="">
                        <div class="iradio_minimal-grey" style="position: relative;"><input value="0" type="radio" name="gioitinh" class="icheck" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Nữ </label>
                @else
                    <label class="">
                        <div class="iradio_minimal-grey " style="position: relative;"><input value="0" type="radio" name="gioitinh" checked="" class="icheck" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Nữ </label>
                    <label class="">
                        <div class="iradio_minimal-grey" style="position: relative;"><input value="1" type="radio" name="gioitinh" class="icheck" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Nam </label>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="control-label"><strong>Địa chỉ Email</strong></label>
        <input name="email" type="text" value='{{$thongtincanhan->email}}' class="form-control"/>
    </div>

    <label class="control-label"><strong>Địa chỉ</strong></label>

    <div class="form-group">
        <label class="control-label col-md-1">Tỉnh:</label>
        <div class="col-md-3">
            <select name="tinh_id" class="bs-select form-control" data-live-search="true" data-size="8">
                @foreach($selectTinh as $id=>$tinh)
                    <option value="{{$id}}">{{$tinh}}</option>

                @endforeach
            </select>
        </div>
        <label class="control-label col-md-1">Huyện:</label>
        <div class="col-md-3">
            <select name="huyen_id" class="bs-select form-control" data-live-search="true" data-size="8">
                @foreach($selectHuyen as $id=>$huyen)
                    <option value="{{$id}}">{{$huyen}}</option>

                @endforeach
            </select>
        </div>
        <label class="control-label col-md-1">Xã:</label>
        <div class="col-md-3">
            <select name="xa_id" class="bs-select form-control" data-live-search="true" data-size="8">
                @foreach($selectXa as $id=>$xa)
                    <option value="{{$id}}">{{$xa}}</option>

                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group"><label></label></div>
    <div class="form-group">
        <label for="dantoc" class="control-label"><strong>Dân tộc</strong></label>
        <input name="dantoc" type="text" value='{{$thongtincanhan->dantoc}}' class="form-control"/>
    </div>
    <div class="form-group">
        <label for="tongiao" class="control-label"><strong>Tôn giáo</strong></label>
        <input name="tongiao" type="text" value='{{$thongtincanhan->tongiao}}' class="form-control"/>
    </div>
    <div class="form-group">
        <label for="so_cmnd" class="control-label"><strong>Số chứng minh nhân dân</strong></label>
        <input name="so_cmnd" type="text" value='{{$thongtincanhan->so_cmnd}}' class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email" class="control-label"><strong>Ngày cấp</strong></label>
        <input name="ngaycap_cmnd" class="form-control" type="date" value="{{$thongtincanhan->ngaycap_cmnd}}">
    </div>
    <div class="margiv-top-10">
        <button type="submit" class="btn green"> Lưu Thay Đổi</button>
        {{--<a href="javascript:;" class="btn default"> Cancel </a>--}}
    </div>
    {!! Form::close() !!}
    {{--</form>--}}
</div>
<div class="tab-pane" id="tab_1_2">
    {!! Form::model($nguoithans, ['route' => ['nhanvien.profile.updateThongTinNguoiThan'], 'method' => 'patch','enctype'=>'multipart/form-data']) !!}
    @foreach($nguoithans as $index=>$nguoithan)
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i><span>Thông tin {{$nguoithan->quanhe}}</span> </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th> Họ và tên </th>
                            <td><input name="nguoithan[{{$nguoithan->id}}][hoten]" class="form-control" style="width: 100%" value="{{$nguoithan->hoten}}"></td>
                        </tr>
                        <tr>
                            <th> Quan hệ là </th>
                            <td><input name="nguoithan[{{$nguoithan->id}}][quanhe]" class="form-control" style="width: 100%" value="{{$nguoithan->quanhe}}"></td>
                        </tr>
                        <tr>
                            <th> Ngày tháng năm sinh </th>
                            <td> <input name="nguoithan[{{$nguoithan->id}}][namsinh]" class="form-control" type="date" value="{{$nguoithan->namsinh}}"> </td>
                        </tr>
                        <tr>
                            <th> Nghề nghiệp </th>
                            <td><input name="nguoithan[{{$nguoithan->id}}][nghenghiep]" class="form-control" style="width: 100%;border: 1px solid #ccc" value="{{$nguoithan->nghenghiep}}"></td>
                        </tr>
                        <tr>
                            <th> Nguyên Quán </th>
                            <td><input name="nguoithan[{{$nguoithan->id}}][nguyenquan]" class="form-control" style="width: 100%;border: 1px solid #ccc" value="{{$nguoithan->nguyenquan}}"></td>
                        </tr>
                        <tr>
                            <th> Địa Chỉ </th>
                            <td><input name="nguoithan[{{$nguoithan->id}}][diachi]" class="form-control" style="width: 100%;border: 1px solid #ccc" value="{{$nguoithan->diachi}}"></td>
                        </tr>
                        <tr>
                            <th> Điện thoại liên hệ </th>
                            <td><input name="nguoithan[{{$nguoithan->id}}][sdt]" class="form-control" style="width: 100%;border: 1px solid #ccc" value="{{$nguoithan->sdt}}"></td>
                        </tr>
                        <tr>
                            <th> Địa chỉ công tác </th>
                            <td><input name="nguoithan[{{$nguoithan->id}}][diachi_congtac]" class="form-control" style="width: 100%;border: 1px solid #ccc" value="{{$nguoithan->diachi_congtac}}"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    @endforeach



    <div id="buttonActionRelative" class="margiv-top-10">
        <a id="addRelative" index="-1" class="btn green"> Thêm Người Thân</a>
        <button type="submit" class="btn green"> Lưu Thay Đổi</button>
        {{--<a href="javascript:;" class="btn default"> Cancel </a>--}}
    </div>
    {!! Form::close() !!}

</div>
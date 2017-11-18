<div class="tab-pane" id="tab_1_3">
    {!! Form::model($quatrinhcongtac, ['route' => ['nhanvien.profile.updateQuaTrinhCongTac'], 'method' => 'patch','enctype'=>'multipart/form-data']) !!}
        @foreach($quatrinhcongtac as $quatrinh )
        <div class="portlet box green">
            <div class="portlet-title tieudeqtct{{$quatrinh->id}}">
                <div class="caption">
                    <i class="fa fa-calendar-check-o"></i><span tungay="{{$quatrinh->tu_ngay}}" denngay = "{{$quatrinh->den_ngay}}" id = "thoigianCongTac{{$quatrinh->id}}">{{$quatrinh->tu_ngay}} đến {{$quatrinh->den_ngay}}</span></div>
                <div class="tools">
                    <a href="javascript:;" class="collapse collapse{{$quatrinh->id}}" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove removeQTCT{{$quatrinh->id}}" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body bodyqtct{{$quatrinh->id}}">
                <div class="scroller" style="overflow: hidden; width: auto;" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd" data-initialized="1">
                    <strong id="congviec{{$quatrinh->id}}">{{$quatrinh->congviect}}</strong>
                    <br>
                    <p id="ghichu{{$quatrinh->id}}">{{$quatrinh->ghichu}}</p>
                </div>
                <div index="{{$quatrinh->id}}" class="suaQuaTrinhCongTac btn blue">Sửa</div>
            </div>
            <div id = 'prependQTCT{{$quatrinh->id}}'></div>

        </div>






        {{--<div class="portlet box green">--}}
            {{--<div class="portlet-title">--}}
                {{--<div class="caption">--}}
                    {{--<i class="fa fa-user"></i><span>Sửa thông tin</span> </div>--}}
                {{--<div class="tools">--}}
                    {{--<a href="javascript:;" class="collapse" data-original-title="" title=""> </a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="portlet-body">--}}
                {{--<div class="table-scrollable">--}}
                    {{--<table class="table table-striped table-hover">--}}
                        {{--<tr>--}}
                            {{--<th> Từ ngày </th>--}}
                            {{--<td> <input name="quatrinhcongtac[1][tu_ngay]" class="form-control" type="date" value="2017-03-04"> </td>--}}
                        {{--</tr>--}}
                        {{--<tr><th> Đến ngày </th><td> <input name="quatrinhcongtac[1][den_ngay]" class="form-control" type="date" value="2017-03-04"> </td></tr>--}}
                        {{--<tr><th> Công việc </th><td><input name="quatrinhcongtac[1][congviect]" class="form-control" style="width: 100%;border: 1px solid #ccc" value="Cong Viec"></td></tr>--}}
                        {{--<tr><th> Ghi chú </th><td><input name="quatrinhcongtac[1][ghichu]" class="form-control" style="width: 100%;border: 1px solid #ccc" value="Ghi chu"></td></tr>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}



        @endforeach



    <div id="buttonAddQuaTrinhCongTac" class="margiv-top-10">
        <a id="addQuaTrinhCongTac" index="-1" class="btn green">Thêm thông tin</a>
        <button type="submit" class="btn green"> Lưu Thay Đổi</button>
        {{--<a href="javascript:;" class="btn default"> Cancel </a>--}}
    </div>
    {!! Form::close() !!}
</div>
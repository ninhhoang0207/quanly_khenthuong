<div class="tab-pane" id="tab_1_5">
    @foreach($thongbao as $cuocthi)
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i>{{$cuocthi->ten}} </div>
                <div class="tools">
                    <a href="javascript:;" class="expand" data-original-title="" title=""> </a>
                    <a href="javascript:;" class="remove" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body portlet-collapsed" style="display: none;">
                <span>Thời hạn tham gia: <strong>Trước ngày {{$cuocthi->thoihan_thamgia}}</strong></span><br>
                <span>Giải thưởng: <strong>{{$cuocthi->giaithuong}} VNĐ</strong></span><br>
                <br><span>Nội dung</span>
                <p>{{$cuocthi->mota}} </p>
                <div class="margin-top-10">
                    <a href="{{route('nhanvien.profile.download',$cuocthi->id)}}" class="btn blue"> Tải file đính kèm </a>
                    <a href="javascript:;" class="btn blue"> Tham gia </a>
                </div>
            </div>
        </div>
    @endforeach



</div>
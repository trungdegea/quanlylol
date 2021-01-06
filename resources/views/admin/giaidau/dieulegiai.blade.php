@extends('admin.layouts.index')

@section('title')
    <title>Điều Lệ Giải {{$giaidau->TenGD}}</title>
@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
         <h1><p style="font-family:Arial, Helvetica, sans-serif; font-weight: bold; padding-left: 3%">Điều Lệ Giải Đấu <span style="color: #A0522D">"{{$giaidau->TenGD}}" </span> </p> </h1>
         <div class="main main-raised">
             <div class="container main-raised">
                <div class="container content">  
                <h5>Điều 1. Mục đích - ý nghĩa</h5>
                <p class="description">
                    {{$giaidau->TenGD}} là giải đấu bán chuyên để tìm ra các đội tuyển cho vòng thăng hạng của giải đấu Vietnam Championship Series <?php echo date("Y"); ?>. <br>
                    Đây là cơ hội để các đội tuyển tiến đến đấu trường chuyên nghiệp của nền Liên Minh Huyền Thoại Việt Nam và Thế Giới.
                </p>
                <h5>Điều 2. Đối tượng tham dự giải</h5>
                <p class="description">
                    1. Đối tượng: <br>
                    - Các đội tuyển LMHT tại tại Việt Nam có Vận động viên có độ tuổi từ 15 tuổi trở lên (sinh trước ngày 30.11.2005) <br>
                    2. Điều kiện: <br>
                    - Có địa điểm thi đấu tập trung, có hình ảnh xác thực nơi thi đấu. <br>
                    - Các đội tuyển đều phải đăng ký đầy đủ thông tin và được xác nhận bởi BTC. <br>
                    - Tất cả các VĐV đã tham gia giải đấu Vietnam Championship Series mùa Hè 2020 và đang tham gia các giải đấu chuyên nghiệp tại nước ngoài sẽ không được phép tham dự giải đấu. <br>
                    - Tất cả các game thủ phải đảm bảo không vi phạm bộ luật thi đấu chung của Liên Minh Huyền Thoại Việt Nam. <br>
                    3. Quy định đặt tên: <br>
                    Các đội tham gia thi đấu: Sử dụng một tên đội duy nhất trong suốt quá trình tham gia giải. Tính từ lúc thi đấu vòng tuyển chọn đến lúc kết thúc. <br>
                    Tên đội tuyển và tên các thành viên trong đội phải phù hợp với thuần phong mỹ tục của Việt Nam. <br>
                    4. Đơn vị thi đấu: <br>
                    Đội được xem là có đủ điều kiện nếu đáp ứng đầy đủ các yêu cầu sau: <br>
                    - Số thành viên tối thiểu trong đội là 05 (05 chính thức và dự bị), tối đa trong đội là 10. <br>
                </p>
                <h5>Điều 3. Thời gian - địa điểm thi đấu</h5>
                <p class="description">
                    1. Thời gian: <br>
                    Thời gian thi đấu sẽ được bắt đầu vào: <span style="background-color: green">{{$giaidau->TGBD}}. </span><br>
                    Thời gian thi đấu sẽ được kết thúc vào: <span style="background-color: red">{{$giaidau->TGKT}}. </span><br>
                    2. Địa điểm thi đấu: <br>
                    Địa điểm thi đấu: Tại các địa điểm đội đăng ký với BTC.
                </p>
                <h5>Điều 4. Luật thay đổi thành viên</h5>
                <p class="description">
                    1. Các quy định chung:
1.1 Vi phạm hợp đồng. Những thay đổi thành viên không được phép vi phạm bất cứ điều khoản nào trong “Quy định về quản lý đội và VĐV thi đấu TTĐT”. Người đại diện của đội khi chuyển nhượng hoặc sa thải thành viên cũng có trách nhiệm đảm bảo các điều khoản đã cam kết trước khi việc thay đổi này có hiệu lực. <br>
1.2 Yêu cầu tối thiểu về đội hình. Những thay đổi thành viên này phải dựa trên nguyên tắc đảm bảo yêu cầu tối thiểu về đội hình bao gồm 05 thành viên chính thức (tối đa 10 thành viên). <br>
1.3 Bổ sung thủ tục. Tất cả các thay đổi thành viên đều phải được sự đồng ý của BTC thông qua “Đơn đề nghị thay đổi đội hình” tối thiểu trước khi giải bắt đầu 1 ngày (Gửi qua email : yourleague@ved.com.vn). <br>
1.4 Giới hạn thay đổi. Bất cứ người chơi nào tự rời khỏi hoặc bị sa thải khỏi đội hình thi đấu chính thức (vì bất cứ lý do gì) không được phép gia nhập lại bằng bất cứ hình thức nào trong thời gian giải đấu đang diễn ra. <br>
1.5 Mỗi game thủ chỉ được phép thi đấu cho 1 đội tuyển duy nhất trong suốt quá trình diễn ra giải đấu. 
                </p>
                <h5>Điều 5. Thể thức thi đấu - luật thi đấu – hình phạt - trọng tài - Cách tính điểm</h5>
                <p class="description">
                    1. Thể thức thi đấu: Liên Minh Huyền Thoại <br>
                    1.1. Hình thức thi đấu: 5 vs 5 <br>
                    1.2. Bản đồ: Summoner’s Rift <br>
                    1.3. Chế độ: Đấu giải <br>
                    1.4. Thể thức giải đấu: Theo quy định của BTC <br>
                    1.5. Phiên bản: Theo quy định của BTC <br>
                    1.6. Tài khoản thi đấu: sử dụng đúng tài khoản đã đăng kí với BTC. <br>
                </p>
                <p class="description">
                    2. Luật thi đấu: <br>
Áp dụng luật thi đấu chính thức của bộ môn TTĐT Liên Minh Huyền Thoại Việt Nam bổ sung thêm các quy định dưới đây: <br>
2.1. Các đội phải cung cấp đầy đủ những thông tin được yêu cầu để chuẩn bị cho công tác tổ chức. Nếu việc chậm trễ này làm ảnh hưởng đến công tác tổ chức, BTC có quyền loại đội vi phạm ra khỏi giải đấu. <br>
2.2. Trong suốt quá trình thi đấu, các đội không được phép thay đổi tên đội. <br>
2.3. Việc thay đổi tên tài khoản thi đấu không thông qua sự đồng ý của BTC được xem như vi phạm. <br>
2.4. Tối thiểu 5 thành viên của đội tham gia thi đấu phải có mặt ở địa điểm thi đấu chỉ định trước 30 phút so với thời gian trận đấu bắt đầu. Các đội không đủ 5 thành viên khi bắt đầu thi đấu đều được xem là vi phạm. Không có mặt sau 15 phút sau thời gian bắt đầu dự kiến trận đấu, đội bị xử thua. <br>
2.5. Các đội không được phép tự ý bỏ cuộc hay rời trận đấu. <br>
2.6. Các cá nhân/đội tuyển đã thi đấu ở bảng này không được phép tiếp tục thi đấu ở bảng khác. <br>
2.7. Không được nhờ đánh hộ và gian lận dưới mọi hình thức. <br>
2.8. Mỗi đội phải chốt thành viên tham gia trận trước khi trận đấu bắt đầu. Trong suốt quá trình cấm chọn và thi đấu không được quyền thay người. Kể cả đó là thành viên dự bị của đội. <br>
</p>
<p class="description">
3. Hình phạt: <br>
Tùy vào mức độ vi phạm các quy định của BTC, hình phạt sẽ được đưa ra và quyết định của BTC là quyết định cuối cùng. <br>
</p>
<p class="description">
4. Trọng tài và giám sát: <br>
4.1. Tất cả trọng tài và giám sát giải đấu do ban tổ chức chỉ định.
4.2. Tất cả các trận đấu từ vòng bảng sẽ có trọng tài, giám sát Online và giám sát trực tiếp tại địa điểm thi đấu. <br>
</p>
<p class="description">
5. Cách tính điểm: <br>
5.1. Đối với các trận đấu vòng bảng: <br>
Các đội thi đấu vòng tròn BO1. Mỗi trận thắng được tính 1 điểm. <br>
Đội đứng nhất sẽ là NHÀ VÔ ĐỊCH. <br>
Nếu các đội bằng điểm nhau thì sẽ tính đến chỉ số phụ những trận mà các đội bằng điểm gặp nhau theo mức độ ưu tiên giảm dần: Thành tích đối đầu > Số mạng hạ gục. <br>

Cách tính số mạng hạ gục: <br>
* Điểm = Tổng số mạng hạ gục - Tổng số mạng bị giết <br>
* Điểm đội nào cao hơn thì xếp trên <br>
                </p>
                <h5>Điều 6. Phòng thi đấu</h5>
                <p class="description">
1. Phòng thi đấu: <br>
BTC sẽ tạo phòng đấu và mời 2 đội vào phòng, kết thúc trận đấu chụp ảnh màn hình kết quả và gửi lại cho BTC. <br>
2. Tên phòng thi đấu: Có cú pháp: [Tên Giải] Đội 1 vs Đội 2, trong đó Đội 1 và Đội 2 là tên của 2 đội. BTC sẽ tạo phòng và mời 2 đội vào theo thứ tự. <br>
3. Vị trí đội: đội Xanh (Blue) và đội Đỏ (Red) sẽ do BTC chỉ định. Đội 1 là đội xanh, đội 2 là đội đỏ. <br>
4. Đối tượng tham gia: Chỉ những người được BTC chỉ định mới được phép tham gia Phòng thi đấu. <br>

                </div>
             </div>
         </div>
     </div>
@endsection

@section('siderbar')
<li class="nav-header" style="text-align: center;"><h5>HỒ SƠ GIẢI ĐẤU</h5></li>
<li class="nav-item " style="color"><hr style="width:200px; background-color:white; height:1.5; "></li>
<li class="nav-item pl-1">
  <a href="{{route('chitiet-giaidau.get',[$giaidau->MaGD])}}" class="nav-link ">
    <i class="nav-icon ion-android-home"></i>
    <p>
      Trang chủ
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-book "></i>
    <p>
      Đội tuyển
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview pl-3">
    <li class="nav-item ml-1">
      <a href="{{route("ds-doi.get",[$giaidau->MaGD])}}" class="nav-link">
        <i class="ion-android-list nav-icon"></i>
        <p>Danh sách</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route("them-doi.get",[$giaidau->MaGD])}}" class="nav-link">
        <i class="far ion-android-add nav-icon"></i>
        <p>Thêm đội</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item pl-1">
  <a href="{{route('ds-thanhvien.get',[$giaidau->MaGD])}}" class="nav-link ">
    <i class="nav-icon ion-android-person"></i>
    <p>
      Tuyển thủ
    
    </p>
  </a>

</li>
<li class="nav-item">
  <a href="{{route('lichthidau.get',[$giaidau->MaGD])}}" class="nav-link">
    <i class="nav-icon far fa-calendar-alt"></i>
    <p>
      Lịch thi đấu - kết quả
   
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{route('dieulegiai.get', [$giaidau->MaGD])}}" class="nav-link">
    <i class="nav-icon fas fa-file"></i>
    <p>
      Điều lệ giải
    </p>
  </a>
</li>
@endsection

<link href="/assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
<style>
.main {
      background: #FFFFFF;
      position: relative;
      z-index: 3;
    }
    
.main-raised {
      margin: 0 30px 0px;
      border-radius: 6px;
      box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
    }
    
.container .content{
    padding: 2%;
    background: #E0FFFF;
}
</style>

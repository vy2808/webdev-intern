@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-4 mb-3">
            <h3>User Registration</h3>
            <label>Registration Number</label>
            <div class="d-flex flex-column flex-md-row">
                <input type="text" id="sbd_input" class="form-control w-100 w-md-50 mb-2 mb-md-0" placeholder="Enter registration number">
                <button id="search_score" class="btn btn-dark ms-md-2">Submit</button>
            </div>
        </div>

        <div class="card p-4">
            <h3>Detailed Scores</h3>
            <div id="score_result">
                <p>Enter a registration number to see scores.</p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
        $(document).ready(function () {
            console.log('jQuery Loaded:', typeof $);

            // Sự kiện click cho nút Submit
            $(document).on('click', '#search_score', function () {
                console.log('Button Clicked!');

                var sbd = $('#sbd_input').val().trim();
                if (sbd === '') {
                    alert('Vui lòng nhập số báo danh');
                    return;
                }

                console.log('Sending AJAX request with SBD:', sbd);

                $.ajax({
                    url: "{{ route('get.score') }}", 
                    type: "GET",
                    data: { sbd: sbd },
                    dataType: "json",
                    success: function (response) {
                        console.log('API Response:', response);

                        if (response.success) {
                            var scores = response.data;
                            var scoreHtml = `
                                <strong>SBD:</strong> ${scores.sbd} <br>
                                <strong>Toán:</strong> ${scores.toan ?? 'N/A'} <br>
                                <strong>Ngữ Văn:</strong> ${scores.ngu_van ?? 'N/A'} <br>
                                <strong>Ngoại Ngữ:</strong> ${scores.ngoai_ngu ?? 'N/A'} <br>
                                <strong>Vật Lý:</strong> ${scores.vat_li ?? 'N/A'} <br>
                                <strong>Hóa Học:</strong> ${scores.hoa_hoc ?? 'N/A'} <br>
                                <strong>Sinh Học:</strong> ${scores.sinh_hoc ?? 'N/A'} <br>
                                <strong>Lịch Sử:</strong> ${scores.lich_su ?? 'N/A'} <br>
                                <strong>Địa Lý:</strong> ${scores.dia_li ?? 'N/A'} <br>
                                <strong>GDCD:</strong> ${scores.gdcd ?? 'N/A'} <br>
                                <strong>Mã Ngoại Ngữ:</strong> ${scores.ma_ngoai_ngu ?? 'N/A'} <br>
                                <button id="clear_result" class="btn btn-secondary mt-3">Clear</button>
                            `;
                            $('#score_result').html(scoreHtml);
                        } else {
                            $('#score_result').html('<strong>Không tìm thấy kết quả</strong>');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('Lỗi AJAX:', xhr.status, error);
                        $('#score_result').html('<strong>Lỗi khi lấy dữ liệu</strong>');
                    }
                });
            });

            // Sự kiện click cho nút Clear (được thêm sau khi kết quả hiển thị)
            $(document).on('click', '#clear_result', function () {
                console.log('Clear Button Clicked!');
                $('#sbd_input').val(''); // Xóa nội dung ô input
                // Reset lại phần kết quả
                $('#score_result').html('<p>Enter a registration number to see scores.</p>');
            });
        });
    </script>
@endsection

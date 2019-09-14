<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bảng Điểm</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body id="search_main">
    <table align="center" class="infor">
        <tr>
            <th>Họ Và Tên: </th>
            <td>Trương Bá Nghĩa</td>
        </tr>
        <tr>
            <th>Lớp:</th>
            <td>K60QLTT</td>
        </tr>
        <tr>
            <th>Ngày Sinh: </th>
            <td>11/04/97</td>
        </tr>
        <tr>
            <th>Năm Học: </th>
            <td>2019-2020</td>
        </tr>
    </table>
    <form action="">
        <label><strong>Năm Học</strong></label>
        <select name="nam_hoc" id="">
            <option selected value="1">2019-2020</option>
        </select>
    </form>
    <table align="center" class="result_sr">
        <thead>
            <tr>
                <th colspan="11">
                    <h2>Bảng kết quả học tập</h2>
                </th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Mã Môn Học</th>
                <th>Tên Môn Học</th>
                <th>Điểm Miệng</th>
                <th>Điểm 15 Phút</th>
                <th>Điểm 15 Phút</th>
                <th>Điểm 1 Tiết</th>
                <th>Điểm 1 Tiết</th>
                <th>Điểm Thi</th>
                <th>Điểm Trung Bình</th>
                <th>Học Kỳ</th>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td>1</td>
                <td>TA</td>
                <td>Tiếng Anh</td>
                <td>8</td>
                <td>8</td>
                <td>8</td>
                <td>8</td>
                <td>8</td>
                <td>8</td>
                <td>8</td>
                <td>I</td>
            </tr>
            <tr>
                    <td>1</td>
                    <td>TO</td>
                    <td>Toán</td>
                    <td>8</td>
                    <td>8</td>
                    <td>8</td>
                    <td>8</td>
                    <td>8</td>
                    <td>8</td>
                    <td>8</td>
                    <td>II</td>
                </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="9">Điểm Trung Bình Học Kỳ I</th>
                <th colspan="2">8.0</th>
            </tr>
            <tr>
                <th colspan="9">Điểm Trung Bình Học Kỳ II</th>
                <th colspan="2">8.0</th>
            </tr>
            <tr>
                <th colspan="9">Điểm Trung Bình Năm Học</th>
                <th colspan="2">8.0</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>
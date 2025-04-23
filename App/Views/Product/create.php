<?php include 'Layout/header.php'; ?>

<div class="panel panel-default">
    <div class="panel-heading">Thêm sản phẩm mới</div>
    <div class="panel-body">
        <form action="store" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Lưu sản phẩm</button>
            <a href="index" class="btn btn-default">Quay lại</a>
        </form>
    </div>
</div>

<?php include 'Layout/footer.php'; ?>
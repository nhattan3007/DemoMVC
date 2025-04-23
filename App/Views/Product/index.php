<?php include 'Layout/header.php' ?>

<div class="panel panel-default">
    <div class="panel-heading">Danh sách sản phẩm</div>
    <div class="panel-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productList as $product): ?>
                <tr>
                    <td><?php echo $product['ProductID']; ?></td>
                    <td><?php echo htmlspecialchars($product['ProductName']); ?></td>
                    <td><?php echo number_format($product['Price'], 2); ?> VND</td>
                    <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'Layout/footer.php' ?>
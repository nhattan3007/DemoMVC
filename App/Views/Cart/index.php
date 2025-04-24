<?php
require_once __DIR__ . "/../../../Layout/homeHeader.php";
$config = require 'config.php';
$baseURL = $config['baseURL'];


?>

<section>
    <div class="container">
        <h2>
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <h1 class="fw-bolder">🛒 Giỏ hàng của bạn</h1>
                </div>
                    <?php if (empty($cartItems)) : ?>
                    <div class="alert alert-info text-center">
                        Chưa có sản phẩm nào trong giỏ hàng.
                    </div>
                    <?php else : ?>
                    <table class="table table-bordered text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $totalPrice = 0;
                            foreach ($cartItems as $item) :
                                $itemTotal = $item['Price'] * $item['quantity'];
                                $totalPrice += $itemTotal;
                            ?>
                                <tr>
                                    <td><?= $item['ProductName'] ?></td>
                                    <td>$<?= number_format($item['Price'], 0) ?></td>
                                    <td><?= $item['quantity'] ?></td>
                                    <td>$<?= number_format($itemTotal, 0) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr class="table-secondary">
                                <td colspan="3" class="text-end">Tổng tiền:</td>
                                <td>$<?= number_format($totalPrice, 0) ?></td>
                            </tr>
                        </tfoot>
                    </table>

                    <!-- Nút checkout -->
                    <div class="text-end">
                        <a href="<?= $baseURL ?>order/checkout" class="btn btn-success">🛍️ Tiến hành thanh toán</a>
                    </div>
                <?php endif; ?>
            </div>
        </h2>
    </div>
</section>
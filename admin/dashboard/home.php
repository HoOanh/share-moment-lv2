<!-- oder details list -->

<div class="recentOrder">
    <div class="cardHeader">
        <h2>Recent Orders</h2>
        <a href="#" class="ad-btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Name</td>
                <td>Price</td>
                <td>Payment</td>
                <td>Status</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($invoiceList as $item) { ?>
                <tr>
                    <td><?= $item['nameProduct'] ?></td>
                    <td><?= $item['Price'] ?></td>
                    <td>Paid</td>
                    <td><span class="status <?= $item['status'] ?>"><?= $item['status'] ?></span></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>

<!-- New Customers -->
<div class="recentCustomers">
    <div class="cardHeader">
        <h2>Recent Customers</h2>
    </div>
    <table>
        <?php foreach ($clientList as $client) { ?>
            <tr>
                <td width="60px">
                    <div class="imgBx">
                        <img src="<?= $ASSETS_URL ?>/images/products/product-1.webp" alt="" />
                    </div>
                </td>
                <td>
                    <h4><?= $client['fullName'] ?> <br /><span><?= $client['email'] ?></span></h4>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
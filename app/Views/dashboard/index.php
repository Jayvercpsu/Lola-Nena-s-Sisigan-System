<?= view('layouts/header') ?>

<h1 class="mb-4">Dashboard</h1>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Products</h6>
                        <h2 class="mb-0"><?= $totalProducts ?></h2>
                    </div>
                    <div class="text-danger" style="font-size: 3em; opacity: 0.3;">
                        <i class="bi bi-box-seam"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Total Users</h6>
                        <h2 class="mb-0"><?= $totalUsers ?></h2>
                    </div>
                    <div class="text-danger" style="font-size: 3em; opacity: 0.3;">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card stat-card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-2">Welcome</h6>
                        <h5 class="mb-0"><?= session()->get('full_name') ?></h5>
                    </div>
                    <div class="text-danger" style="font-size: 3em; opacity: 0.3;">
                        <i class="bi bi-person-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Recent Products</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($recentProducts)): ?>
                        <?php foreach($recentProducts as $product): ?>
                            <tr>
                                <td><?= esc($product['product_name']) ?></td>
                                <td>₱<?= number_format($product['price'], 2) ?></td>
                                <td><?= $product['stock'] ?></td>
                                <td><?= date('M d, Y', strtotime($product['created_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No products available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>
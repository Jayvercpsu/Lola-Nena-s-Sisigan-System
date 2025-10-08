<?= view('layouts/header') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Product Management</h1>
    <a href="<?= base_url('products/create') ?>" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add New Product
    </a>
</div>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($products)): ?>
                        <?php foreach($products as $product): ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><strong><?= esc($product['product_name']) ?></strong></td>
                                <td><?= esc($product['description']) ?></td>
                                <td>₱<?= number_format($product['price'], 2) ?></td>
                                <td>
                                    <span class="badge bg-<?= $product['stock'] > 20 ? 'success' : ($product['stock'] > 0 ? 'warning' : 'danger') ?>">
                                        <?= $product['stock'] ?>
                                    </span>
                                </td>
                                <td><?= date('M d, Y', strtotime($product['created_at'])) ?></td>
                                <td>
                                    <a href="<?= base_url('products/edit/' . $product['id']) ?>" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <a href="<?= base_url('products/delete/' . $product['id']) ?>" 
                                       class="btn btn-sm btn-danger" 
                                       onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No products found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= view('layouts/footer') ?>
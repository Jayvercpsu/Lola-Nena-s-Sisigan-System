<?= view('layouts/header') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit Product</h1>
    <a href="<?= base_url('products') ?>" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to Products
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('products/update/' . $product['id']) ?>" method="post">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name *</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?= esc($product['product_name']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?= esc($product['description']) ?></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Price (₱) *</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?= $product['price'] ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="stock" class="form-label">Stock Quantity *</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="<?= $product['stock'] ?>" required>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="<?= base_url('products') ?>" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update Product
                </button>
            </div>
        </form>
    </div>
</div>

<?= view('layouts/footer') ?>
<?= view('layouts/header') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Edit User</h1>
    <a href="<?= base_url('users') ?>" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Back to Users
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Username *</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                    <small class="text-muted">Leave blank if you don't want to change the password</small>
                </div>
            </div>

            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name *</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?= esc($user['full_name']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role *</label>
                <select class="form-select" id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                    <option value="staff" <?= $user['role'] == 'staff' ? 'selected' : '' ?>>Staff</option>
                </select>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="<?= base_url('users') ?>" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update User
                </button>
            </div>
        </form>
    </div>
</div>

<?= view('layouts/footer') ?>
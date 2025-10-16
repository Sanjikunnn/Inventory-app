<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InventoryApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/dashboard">InventoryApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="masterDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Master
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="masterDropdown">
                        <li><a class="dropdown-item" href="/items">Items</a></li>
                        <li><a class="dropdown-item" href="/suppliers">Suppliers</a></li>
                        <li><a class="dropdown-item" href="/customers">Customers</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="transactionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Transactions
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="transactionDropdown">
                        <li><a class="dropdown-item" href="/po">Purchase Orders</a></li>
                        <li><a class="dropdown-item" href="/grn">Goods Receipts (GRN)</a></li>
                    </ul>
                </li>

                <li class="nav-item"><a class="nav-link" href="/setting">User Management</a></li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/logout">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

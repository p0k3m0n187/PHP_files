<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP User Input</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Create Menu</h1>
        <form action="AddMenu.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Menu Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="mt-5">
            <h1 class="text-center">Menu List</h1>
                <table class="table">
            <thead>
            <tr>
                <th scope="col">Menu Name</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $result = mysqli_query($conn, "SELECT * FROM ref_menu");
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['menu_name']}</td>";
                echo "<td>{$row['menu_desc']}</td>";
                echo "<td>
                        <button type='button' class='btn btn-primary' onclick='editMenu({$row['id']})'>Update</button>
                        <button type='button' class='btn btn-danger' onclick='confirmDelete({$row['id']})'>Delete</button>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0v8FqFjcJ6pajs/rfdfs3SO+kD4Ck5BdPtF+to8xMp9Mvc9l84l+78+m696jLmfIjzj6t" crossorigin="anonymous"></script>
    <script>
        document.getElementById('name').addEventListener('input', function() {
            if (this.value.length > 100) {
                swal.fire('Character Limit Exceeded', 'Menu Name should not exceed 100 characters.', 'error');
                this.value = this.value.substring(0, 100);
            }
        });

        document.getElementById('description').addEventListener('input', function() {
            if (this.value.length > 1000) {
                swal.fire('Character Limit Exceeded', 'Description should not exceed 1000 characters.', 'error');
                this.value = this.value.substring(0, 1000);
            }
        });

        // Removed the form submission confirmation using Sweet Alert for now
    </script>
    <script>
        function editMenu(id) {
            // Add code to open a modal with the selected menu details for editing
        }

        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this menu?")) {
                window.location.href = `DeleteMenu.php?id=${id}`;
            }
        }
    </script>
</body>
</html>
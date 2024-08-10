<div class="manage-elections-container">
    <h3 class="section-heading"><i class="fas fa-calendar-alt"></i> Manage Elections</h3>

    <form class="election-form" action="php/add_election.php" method="POST">
        <div class="form-group">
            <label for="name">Election Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter election name" required>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Election</button>
    </form>

    <h3 class="section-heading"><i class="fas fa-list-alt"></i> Existing Elections</h3>
    <table class="elections-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM elections";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['start_date']}</td>
                        <td>{$row['end_date']}</td>
                        <td>
                            <button class='btn btn-danger' onclick='window.location.href=`php/delete_election.php?id={$row['id']}`'>
                                <i class='fas fa-trash-alt'></i> Delete
                            </button>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

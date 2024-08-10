<div class="manage-candidates-container">
    <h3 class="section-heading"><i class="fas fa-user-tie"></i> Manage Candidates</h3>

    <form class="candidate-form" action="php/add_candidate.php" method="POST">
        <div class="form-group">
            <label for="name">Candidate Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter candidate name" required>
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" id="position" name="position" class="form-control" placeholder="Enter position" required>
        </div>
        <div class="form-group">
            <label for="election_id">Election:</label>
            <select id="election_id" name="election_id" class="form-control" required>
                <?php
                $sql = "SELECT * FROM elections";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Add Candidate</button>
    </form>

    <h3 class="section-heading"><i class="fas fa-list"></i> Existing Candidates</h3>
    <table class="candidates-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Election</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT candidates.id, candidates.name, candidates.position, elections.name AS election_name 
                    FROM candidates 
                    JOIN elections ON candidates.election_id = elections.id";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['position']}</td>
                        <td>{$row['election_name']}</td>
                        <td>
                            <button class='btn btn-danger' onclick='window.location.href=`php/delete_candidate.php?id={$row['id']}`'>
                                <i class='fas fa-trash-alt'></i> Delete
                            </button>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<?php
function fetchElections($conn)
{
    $sql = "SELECT * FROM elections";
    $result = $conn->query($sql);
    return $result;
}

function fetchElectionResults($conn, $election_id)
{
    $sql = "SELECT candidates.name, COUNT(votes.id) AS vote_count 
            FROM votes 
            JOIN candidates ON votes.candidate_id = candidates.id 
            WHERE votes.election_id = ? 
            GROUP BY candidates.name
            ORDER BY vote_count DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $election_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
?>

<div class="results-container">
    <h3 class="results-heading"><i class="fas fa-poll"></i> Election Results</h3>
    <form action="voter.php" method="GET" class="results-form">
        <input type="hidden" name="view" value="results">
        <div class="form-group">
            <label for="election_id" class="form-label"><i class="fas fa-calendar-alt"></i> Select Election:</label>
            <select id="election_id" name="election_id" class="form-select" required>
                <?php
                $result = fetchElections($conn);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . "</option>";
                    }
                } else {
                    echo "<option value=''>No elections available</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="view-results-btn"><i class="fas fa-search"></i> View Results</button>
    </form>

    <?php
    if (isset($_GET['election_id'])) {
        $election_id = intval($_GET['election_id']);
        $result = fetchElectionResults($conn, $election_id);

        echo "<div class='results-section'>
                <h4 class='results-title'><i class='fas fa-chart-bar'></i> Results for Election ID: " . htmlspecialchars($election_id) . "</h4>";
        if ($result->num_rows > 0) {
            echo "<table class='results-table'>
                    <thead>
                        <tr>
                            <th>Candidate Name</th>
                            <th>Vote Count</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['vote_count']) . "</td>
                    </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p class='no-results'><i class='fas fa-exclamation-triangle'></i> No results available for this election.</p>";
        }
        echo "</div>";
    }
    ?>
</div>
<?php
include('php/db.php');

if (isset($_GET['election_id'])) {
    $election_id = $_GET['election_id'];
    $sql = "SELECT * FROM candidates WHERE election_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $election_id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<div class='vote-container'>
            <h3 class='vote-heading'>Vote for Election ID: $election_id</h3>";

    if ($result->num_rows > 0) {
        echo "<form action='php/vote.php' method='POST' class='vote-form'>
                <input type='hidden' name='election_id' value='$election_id'>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='candidate-option'>
                    <label for='candidate_{$row['id']}' class='candidate-label'>
                        <input type='radio' id='candidate_{$row['id']}' name='candidate_id' value='{$row['id']}' class='candidate-radio' required>
                        <div class='candidate-info'>
                            <span class='candidate-name'>{$row['name']}</span>
                            <span class='candidate-position'>{$row['position']}</span>
                        </div>
                    </label>
                  </div>";
        }
        echo "  <button type='submit' class='submit-btn'>Submit Vote</button>
              </form>";
    } else {
        echo "<p class='no-candidates'>No candidates are available for this election.</p>";
    }

    echo "</div>";

    $stmt->close();
}
include('templates/footer.php');
?>

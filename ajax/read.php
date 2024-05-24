<?php
// Require the database connection file
require_once(dirname(__DIR__) . "/db.php");

// Create the db query
$stmt = $db->prepare("SELECT * from todo");

$stmt->execute();

$todos = $stmt->fetchAll();

$i = 0;

foreach ($todos as $todo) :
    $i++;
?>

    <!-- Todo Card -->
    <div class="todo_card" aria-label="Todo Card">
        <!-- Card Top: Todo Number, Action Buttons -->
        <div class="card_top">
            <p class="card_number" aria-label="Card <?= $i; ?>">
                <?= $i; ?>
            </p>
            <div class="action_buttons">
                <button class="btn btn_finished <?= ($todo->status == 1) ? "active" : ""; ?>" data-status="<?= $todo->status; ?>" data-id="<?= $todo->id; ?>" aria-label="Finish Todo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                    </svg>
                    </svg>
                </button>

                <button class="btn btn_delete" data-id="<?= $todo->id; ?>" aria-label="Delete Todo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                </button>

                <button class="btn btn_update" data-id="<?= $todo->id; ?>" aria-label="Delete Todo">
                <svg width="16px" height="16px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0" fill="none" width="20" height="20"/>
                    <g>
                    <path d="M10.2 3.28c3.53 0 6.43 2.61 6.92 6h2.08l-3.5 4-3.5-4h2.32c-.45-1.97-2.21-3.45-4.32-3.45-1.45 0-2.73.71-3.54 1.78L4.95 5.66C6.23 4.2 8.11 3.28 10.2 3.28zm-.4 13.44c-3.52 0-6.43-2.61-6.92-6H.8l3.5-4c1.17 1.33 2.33 2.67 3.5 4H5.48c.45 1.97 2.21 3.45 4.32 3.45 1.45 0 2.73-.71 3.54-1.78l1.71 1.95c-1.28 1.46-3.15 2.38-5.25 2.38z"/>
                    </g>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Card Center: Todo Title, Todo Details -->
        <div class="card_center <?= ($todo->status == 1) ? "finished" : ""; ?>">
            <h4><?= $todo->title;  ?></h4>
            <?php if (!empty($todo->details)) {
                echo "<p>" . $todo->details . "</p>";
            } ?>
        </div>

        <!-- Card Bottom: Todo Date -->
        <div class="card_bottom" aria-label="<?= date("h:i A | D, d M, Y", strtotime($todo->createdAt)); ?>">
            <p><?= date("h:i A | D, d M, Y", strtotime($todo->createdAt)); ?></p>
        </div>
    </div>

<?php endforeach; ?>
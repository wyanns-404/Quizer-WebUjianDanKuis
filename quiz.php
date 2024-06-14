<?php
include('./partials/header.php');
include('./db/db.php');
include('./partials/modal.php');
?>

<div class="main bg-container">
    <nav>
        <div class="nav">
            <div class="brand">
                <a href="#">Qzzy</a>
            </div>
            <div class="navb">
                <a href="./teacher.php">Home</a>
                <a href="./quiz.php">Quiz</a>
                <div class="user-button">
                    <a href="./index.php">Log out</a>
                </div>
            </div>
        </div>

    </nav>


    <div class="quiz-container">

        <div class="quiz">

            <div class="mt-4">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Questions</button>
                    <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Result</button>
                </div>

            </div>

            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <button type="button" class="btn btn-dark m-2 float-left" id="add-quiz-button" data-toggle="modal" data-target="#addQuestionModal">
                        Add Question
                    </button>


                    <div class="table-area">
                        <table class="table" style="color: white;">
                            <thead>
                                <tr>
                                    <th scope="col">Quiz ID</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Correct Answer (Letter)</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $stmt = $conn->prepare('SELECT * FROM `tbl_quiz`');
                                $stmt->execute();
                                $result = $stmt->fetchAll();

                                foreach ($result as $row) {
                                    $quizID = $row['tbl_quiz_id'];
                                    $quizQuestion = $row['quiz_question'];
                                    $optionA = $row['option_a'];
                                    $optionB = $row['option_b'];
                                    $optionC = $row['option_c'];
                                    $optionD = $row['option_d'];
                                    $correctAnswer = $row['correct_answer'];
                                ?>

                                    <tr>
                                        <th id="quizID-<?= $quizID ?>"><?= $quizID ?></th>
                                        <td id="quizQuestion-<?= $quizID ?>"><?= $quizQuestion ?></td>
                                        <td id="optionA-<?= $quizID ?>" hidden><?= $optionA ?></td>
                                        <td id="optionB-<?= $quizID ?>" hidden><?= $optionB ?></td>
                                        <td id="optionC-<?= $quizID ?>" hidden><?= $optionC ?></td>
                                        <td id="optionD-<?= $quizID ?>" hidden><?= $optionD ?></td>
                                        <td id="correctAnswer-<?= $quizID ?>"><?= $correctAnswer ?></td>
                                        <td>
                                            <button type="button" class="btn btn-secondary" onclick="updateQuestion(<?= $quizID ?>)"><i class="fa-solid fa-pencil"></i></button>
                                            <button type="button" class="btn btn-danger" onclick="deleteQuestion(<?= $quizID ?>)"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>


                    </div>

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    <table class="table" style="color: white;">
                        <thead>
                            <tr>
                                <th scope="col">Result ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">NPM</th>
                                <th scope="col">Quiz Score</th>
                                <th scope="col">Date Taken</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stmt = $conn->prepare('SELECT * FROM `tbl_result`');
                            $stmt->execute();
                            $result = $stmt->fetchAll();

                            foreach ($result as $row) {
                                $resultID = $row['tbl_result_id'];
                                $studentName = $row['quiz_taker'];
                                $yearSection = $row['year_section'];
                                $totalScore = $row['total_score'];
                                $dateTaken = $row['date_taken'];
                            ?>

                                <tr>
                                    <th id="resultID-<?= $resultID ?>"><?= $resultID ?></th>
                                    <td id="studentName-<?= $resultID ?>"><?= $studentName ?></td>
                                    <td id="yearSection-<?= $resultID ?>"><?= $yearSection ?></td>
                                    <td id="totalScore-<?= $resultID ?>"><?= $totalScore ?></td>
                                    <td id="dateTaken-<?= $resultID ?>"><?= $dateTaken ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" onclick="deleteResult(<?= $resultID ?>)"><i class="fa-solid fa-trash"></i></button>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>


                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
        </div>
    </div>


</div>


<?php include('./partials/footer.php') ?>
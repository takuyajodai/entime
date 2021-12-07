<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>web_secretary</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/sp.css" rel="stylesheet" media="screen and (max-width:600px)">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
      #schedule {
        background-color: #EDF2F7;
      }

      #schedule a {
        color: #222222; 
        font-weight: 700;
      }

      #schedule a:hover{
        border-bottom: none;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <header>  
        <div class="logo">
          <a href="index.html"><img src="../images/logo.png" alt="entime" width=150px></a>
        </div>
        <nav>
          <ul class="global-nav"> 
            <li id="about"><a href="index.html">About</a></li>
            <li id="enter-task"><a href="enter_task.php">Enter Task</a></li>
            <li id="schedule"><a href="your_schedule.php">Your Schedule</a></li>
          </ul>
        </nav>
      </header>
  
      <div id="wrap">
        <div class="content">
          <div class="main">
            <h1>あなたのスケジュール 📅</h1>
            <p>このスケジュールでタスクをこなしていきましょう！</p>
            <section class="description clearfix">
              <h2>スケジュール</h2>
              <?php
              //postをphpの配列で受け取る
              $worktime = $_POST["worktime"];

              $array = $_POST["TaskArray"];

              //date型はリストで受け取りできなかった
              $deadline1 = new DateTime($_POST["deadline1"]);
              $deadline2 = new DateTime($_POST["deadline2"]);
              $deadline3 = new DateTime($_POST["deadline3"]);

              //今日の日付
              $today = new DateTime();
              $diff1 = $deadline1->diff($today);
              $diff2 = $deadline2->diff($today);
              $diff3 = $deadline3->diff($today);
              /*
              echo "日付差";
              echo $diff1->days;

              echo "<br>";
              */

              //連想配列にキー追加
              $array[1]["deadline"] = $diff1->days;
              $array[2]["deadline"] = $diff2->days;
              $array[3]["deadline"] = $diff3->days;

              //締め切りに近い日から昇順ソート
              //ソートでキーが0からになるので注意
              array_multisort(array_column($array, 'deadline'), SORT_ASC, $array);

              //見積もり時間と作業可能時間の差
              $result = 0;
              //作業可能時間
              $available_time = 0;
              //残り日数
              $left_date = 0;
              $past_date = 0;

              foreach ((array) $array as $key1 => $value1) {
                $left_date = $array[$key1]["deadline"] - $past_date;
                echo $array[$key1]["deadline"];
                $past_date = $left_date;
                $available_time = $left_date * $worktime + $result;
                //もし見積もりよりも作業可能時間が長ければ
                $result = $available_time - $array[$key1]["time"];
                if($result >= 0) {
                  if($key1 == 0) { 
                    echo "<p>まず最初に";
                  } else echo "<p>次に";
                  echo "<span class='task_name'>".$array[$key1]["task"]."</span>に取り掛かりましょう．</p>";
                  echo "<br>";
                } else {
                  echo "<p><span class='task_name'>".$array[$key1]["task"]."</span>はその予定では時間が足りません．".$result*(-1)."時間を確保してください</p>";
                  echo "<br>";
                }
              }
              /*
              echo $array[0]["deadline"];
              echo "<br>";
              echo $worktime;
              echo "<br>";
              echo "使える時間".$available_time;
              echo "<br>";
              
              var_dump($array);
              echo "<br>";
              
              echo $array[1]["task"];
              echo "<br>";
              echo $array[3]["time"];
              echo "<br>";
              echo $deadline1;
              */
              ?>
            </section>
          </div>
        </div>
      </div>
  
      <footer>
        <div class=footer>
          <small>(c) 2021 Takuya Jodai</small>
        </div>
      </footer>
    </div>
  </body>
</html>
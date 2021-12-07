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
      #enter-task {
        background-color: #EDF2F7;
      }

      #enter-task a {
        color: #222222; 
        font-weight: 700;
      }

      #enter-task a:hover{
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
            <div class="content-top">
              <h1>タスクの入力 ✏️</h1>
              <p>1日に使える時間と，登録するタスク名，見積もり時間，期限を入力して下さい</p>
            </div>
            <section>
              <div class="form">
                <form action="your_schedule.php" method="post">
                  <h2>あなたの情報</h2>
                  <dl>
                    <dt><span class="required">1日に使える時間(h)</span></dt>
                    <dd><input type="number" name="worktime" class="worktime" required></dd>
                  </dl>
                  <h2>タスク情報</h2>
                  <div class="tasks">
                    <dl>
                      <dt><span class="required">タスク名</span></dt>
                      <dd><input type="text" name="TaskArray[1][task]" class="task" required></dd>
                      <dt><span class="required">予定完了時間(h)</span></dt>
                      <dd><input type="number" name="TaskArray[1][time]" class="time" min="0" required></dd>
                      <dt><span class="required">締め切り</span></dt>
                      <dd><input type="date" name="deadline1" class="deadline" min="<?php echo date('Y-m-d');?>" required></dd>
                    </dl>
                    <dl>
                      <dt><span class="required">タスク名</span></dt>
                      <dd><input type="text" name="TaskArray[2][task]" class="task"></dd>
                      <dt><span class="required">予定完了時間(h)</span></dt>
                      <dd><input type="number" name="TaskArray[2][time]" class="time" min="0"></dd>
                      <dt><span class="required">締め切り</span></dt>
                      <dd><input type="date" name="deadline2" class="deadline" min="<?php echo date('Y-m-d');?>"></dd>
                    </dl>
                    <dl>
                      <dt><span class="required">タスク名</span></dt>
                      <dd><input type="text" name="TaskArray[3][task]" class="task"></dd>
                      <dt><span class="required">予定完了時間(h)</span></dt>
                      <dd><input type="number" name="TaskArray[3][time]" class="time" min="0"></dd>
                      <dt><span class="required">締め切り</span></dt>
                      <dd><input type="date" name="deadline3" class="deadline" min="<?php echo date('Y-m-d');?>"></dd>
                    </dl>
                  </div>
                  <hr>
                  <button type="submit" class="btn">出力</button>
                </form>
              </div>
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
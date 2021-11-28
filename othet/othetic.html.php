<?php
include '/kyrs/includes/connect_db.php';
include '/kyrs/includes/helpers.inc.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Отчет</title>


    <link rel="shortcut icon" href="../../image/title.ico" type="image/x-icon">

    <script type="text/javascript" async src="../../java/timer.js"></script>
    <script type="text/javascript" async src="../../java/dvih.js"></script>
</head>
<body onLoad="JSClock()">
<header>

    <div class="log">
        <img src="../../image/log.png">
    </div>

    <nav class="main-menu">
        <ul>
            <li><a href="../index.php">Главная</a></li>
        </ul>
        <li>
            <?php
            if ($_SESSION['avtoriz'] != '' AND $_SESSION['role'] == '2') {
                echo '<div><b style="color: #ffa22c; font-size: 20px;">' . "Здравствуйте, " . $_SESSION['surname'] . " " . $_SESSION['name'] . " " . $_SESSION['patronymic']
                    . '</b><form action="../index.php" method="POST">
				<input type="submit" name="logout" value="Выйти из аккаунта" style="font-size: 20px;background: #ffa22c;border-radius: 15px;cursor: pointer;height: 40px;
    line-height: 40px;text-align: center;transition-property: background, border-radius;transition-duration: 2s;transition-timing-function: linear;width: 190px;"><br>	
				</form>	
				</div>';
            }
            ?>
        </li>
    </nav>
</header>
<main>
    <section class="cati">
        <div>
            <h1 class="h-1">Договоры</h1>
        </div>
        <div>
            <?php foreach ($contracts as $contract) : ?>
            <form method="POST" action="eksport.pdf.php">
                <div><span>Клиент - </span>
                    <?php echo htmlout($contract['csurname']); ?>
                        <input type="hidden" name="csurname" value="<?php echo htmlout($contract['csurname']); ?>">
                    <?php echo htmlout($contract['cname']); ?>
                        <input type="hidden" name="cname" value="<?php echo htmlout($contract['cname']); ?>">
                    <?php echo htmlout($contract['cpatronymic']); ?>
                        <input type="hidden" name="cpatronymic" value="<?php echo htmlout($contract['cpatronymic']); ?>">
                </div>
                <div><span>Сотрудник - </span>
                    <?php echo htmlout($contract['esurname']); ?>
                        <input type="hidden" name="esurname" value="<?php echo htmlout($contract['esurname']); ?>">
                    <?php echo htmlout($contract['ename']); ?>
                        <input type="hidden" name="ename" value="<?php echo htmlout($contract['ename']); ?>">
                    <?php echo htmlout($contract['epatronymic']); ?>
                        <input type="hidden" name="epatronymic" value="<?php echo htmlout($contract['epatronymic']); ?>">
                </div>
                <div><span>Дата обращения - </span>
                    <?php echo htmlout($contract['appeal']); ?>
                        <input type="hidden" name="appeal" value="<?php echo htmlout($contract['appeal']); ?>">
                </div>
                <div><span>Сумма оплаченная - </span>
                    <?php echo htmlout($contract['amount_paid']); ?>
                        <input type="hidden" name="amount_paid" value="<?php echo htmlout($contract['amount_paid']); ?>">

                </div>
                <div><span>Сумма фактическая - </span>
                    <?php echo htmlout($contract['actual_amount']); ?>
                        <input type="hidden" name="actual_amount" value="<?php echo htmlout($contract['actual_amount']); ?>">
                </div>
                <div>
                    <input type="hidden" name="cbirth" value="<?php echo htmlout($contract['cbirth']); ?>">
                </div>
                <div>
                    <input type="hidden" name="ccity" value="<?php echo htmlout($contract['ccity']); ?>">
                </div>
                <div>
                    <input type="hidden" name="cphone" value="<?php echo htmlout($contract['cphone']); ?>">
                </div>
                <input type="hidden" name="id" value="<?php htmlout($contract['id']); ?>">
                <input type="submit" name="sub_oplata_pdf" id="sub_pecat" value="Вывести договор">
            </form><br>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<footer class="hog-1">
    <p class="h1">ПР-16-2 &copy; Зорин Дмитрий</p>
    <form name="clockForm">
        <input type="text" name="digits" SIZE=4 VALUE="">
    </form>
</footer>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    if (preg_match('/^[a-zA-Z ]+$/', $_POST["name"]) && is_numeric($_POST['number'])) {
        $nama_str = "";
        $number_txt = "";
        $grade = '';
        $message = '';
        $number = $_POST['number'];
        if ($number < 41) {
            $grade = 'E';
            $message = 'TRY AGAIN!!';
        } else if ($number < 56) {
            $grade = 'D';
            $message = 'NICE TRY';
        } else if ($number < 61) {
            $grade = 'C';
            $message = 'ENOUGH';
        } else if ($number < 66) {
            $grade = 'BC';
            $message = 'PRETTY GOOD';
        } else if ($number < 71) {
            $grade = 'B';
            $message = 'GOOD';
        } else if ($number < 81) {
            $grade = 'AB';
            $message = 'VERY GOOD';
        } else if ($number <= 100) {
            $grade = 'A';
            $message = 'PERFECT';
        }
    } else {
        $nama_str = '<div id="name" class="form-text text-start text-danger">nama harus berupa huruf</div>';
        $number_txt = '<div id="name" class="form-text text-start text-danger">nilai harus berupa angka</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
    <style>
        .glass {
            /* From https://css.glass */
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .bg {
            background-image: url('./bg.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container position-relative bg w-100" style="height: 100vh;">
        <nav class="navbar navbar-expand-lg bg-body-tertiary position-absolute py-4 top-0 w-100">
            <div class="container-fluid">
                <a class="navbar-brand text-info" href="#">
                    KONV
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">Konversi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex justify-content-center align-items-center " style="height: 100vh;">
            <form class="glass col-6 d-flex flex-column justify-content-center align-items-center p-4" method="post" action="konversi.php">
                <div class="mb-3 text-center w-75">
                    <label for="exampleInputEmail1" class="form-label fs-1 mb-3">Nama</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="name" required>
                    <?php
                    if ($nama_str) {
                        echo $nama_str;
                    } else
                        echo '<div id="name" class="form-text text-start">masukkan nama</div>';
                    ?>
                    <label for="exampleInputEmail1" class="form-label fs-1 mb-3">Nilai</label>
                    <input type="text" name="number" class="form-control" id="exampleInputNumber" aria-describedby="number" required>
                    <?php
                    if ($number_txt) {
                        echo $number_txt;
                    } else
                        echo '<div id="number" class="form-text text-start">masukkan angka</div>';
                    ?>
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-outline-info" style="width: max-content;">Submit</button>
            </form>
        </div>
    </div>

    <div id="hasil" class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-6 card text-center">
            <div class="card-header">
                Hasil Konversi Nilai
            </div>
            <div class="card-body p-5">
                <h4 class="card-title fs-2"><?php echo $_POST['name'] ?></h4>
                <h5 class="card-title fs-2"><?php echo $message ?></h5>
                <p class="card-text fs-1"><?php echo $grade ?></p>
                <a href="konversi.php" class="btn btn-primary">Konversi lagi</a>
            </div>
            <div class="card-footer text-muted">
            </div>
        </div>
    </div>

    <script src="./bootstrap.bundle.min.js"></script>
    <script>

    </script>
</body>

</html>
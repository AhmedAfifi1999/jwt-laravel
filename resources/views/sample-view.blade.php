<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Test Page</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

<p>Hello from Sample View </p>
<p> My Name is <?= $name ?></p>
<p> Email : <?php echo $email ?></p>
<button onclick="getRepo()">Get repo</button>

</body>
<script>

    

    function getRepo() {
        var htmlRequest = new XMLHttpRequest();

        htmlRequest.onreadystatechange = function () {
            console.log(this.readyState);

            if (this.readyState === 4 && this.status === 200) {
                console.log(htmlRequest.response);
            }

        }
        htmlRequest.open("GET", "https://api.github.com/users/ElzeroWebSchool/repos", true);
        htmlRequest.send();
    };


</script>
</html>

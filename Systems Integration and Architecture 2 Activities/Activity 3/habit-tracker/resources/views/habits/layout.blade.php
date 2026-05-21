<!DOCTYPE html>
<html>
<head>
<title>Habit Flow</title>
<style>
body { font-family: Arial; background:#eef2f7; }
header { background:#6c5ce7; color:white; padding:15px; text-align:center; }
.container { width:80%; margin:auto; }
.card {
    background:white;
    padding:15px;
    margin:10px 0;
    border-radius:10px;
    box-shadow:0 2px 5px rgba(0,0,0,0.1);
}
.btn { padding:6px 10px; color:white; border:none; border-radius:5px; text-decoration:none; }
.add{background:#00b894;} .edit{background:#0984e3;}
.delete{background:#d63031;} .done{background:#6c5ce7;}
.progress { background:#ddd; border-radius:5px; }
.bar { background:#00b894; color:white; padding:3px; }
</style>
</head>
<body>



<div class="container">
@yield('content')
</div>

</body>
</html>
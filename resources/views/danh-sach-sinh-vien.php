<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <table border="1">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Age</td>
            <td>Assdress</td>
            <td>Email</td>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sinhvien as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['name'] ?></td>
            <td><?= $student['age'] ?></td>
            <td><?= $student['address'] ?></td>
            <td><?= $student['email'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
</body>
</html>
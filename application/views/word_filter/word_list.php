<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
</head>
<body>
    <h2><?php echo $title ?></h2>
    <table>
        <thead>
            <tr>
                <th>Words</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($words as $word): ?>
            <tr>
                <td><?php echo $word ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

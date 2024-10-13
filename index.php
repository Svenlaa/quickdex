<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Quickdex</title>
<link rel="stylesheet" href="https://svenlaa.com/style.css" />

<h1>Quickdex</h1>

<?php
    $filenames = scandir('.');
    $directories = array_filter($filenames,  function ($filename) {
        if (str_starts_with($filename, '.')) return false;
        return is_dir($filename);
    });
?>

<!-- <label style="margin: 1em 0">
    Go to
    <input type="text" id="input" autofocus>
</label> -->

<ul>
<?php foreach ($directories as $directory): ?>
    <li>
        <a href="/<?= $directory ?>/"><?= $directory ?></a>
    </li>
<?php endforeach ?>
</ul>
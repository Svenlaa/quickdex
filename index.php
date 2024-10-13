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

<ul></ul>

<script>const directories = <?= json_encode(array_values($directories)) ?> ?? [];</script>
<script>
    const listHtml = directories.map(directory => {
        return `<li><a href="/${directory}">${directory}</a></li>`
    }).join('');
    document.querySelector('ul').innerHTML = listHtml ? listHtml : 'No directories found :('  
</script>
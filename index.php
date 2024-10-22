<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Quickdex</title>
<link rel="stylesheet" href="https://svenlaa.com/style.css" />
<style>
    #searchfield {
        font-size: 0.6em;
        border-width: 0px;
        font-family: inherit;
        outline: 0;
        border-radius: 0.5em;
    }
</style>

<h1 style="display: inline">Quickdex <input id="searchfield" type="text" autofocus /></h1>

<?php
    $filenames = scandir('.');
    $directories = array_filter($filenames,  function ($filename) {
        if (str_starts_with($filename, '.')) return false;
        return is_dir($filename);
    });
?>

<ul></ul>

<script>const directories = <?= json_encode(array_values($directories)) ?> ?? [];</script>
<script>
    const searchField =document.querySelector('#searchfield')
    const listHtml = directories.map(directory => {
        return `<li><a data-directory="${directory}" href="/${directory}">${directory}</a></li>`
    }).join('');
    document.querySelector('ul').innerHTML = listHtml ? listHtml : 'No directories found :(';
    document.body.addEventListener('click', e => {searchField.focus();});
    document.body.addEventListener('keydown', e => {
        const dir = e.target.dataset.directory
        if (e.key === 'Enter' && dir !== undefined) {
            e.preventDefault();
            window.location = e.ctrlKey ? `https://${dir}.test` : `https://localhost/${dir}`;
            return;
        }
    });
    searchField.addEventListener('input', e => {
        const searchValue = searchField.value;
        const filteredDirectories = directories.filter((directory) => directory.toLowerCase().includes(searchValue.toLowerCase()));
        const listhtml2 = filteredDirectories.map(directory => `<li><a data-directory="${directory}" href="/${directory}">${directory}</a></li>`).join('');
        document.querySelector('ul').innerHTML = listhtml2  ? listhtml2  : 'No directories found :(';
    })
</script>

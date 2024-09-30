<h1> Home page </h1>

<?php foreach ($params['post'] as $value) : ?>
    <div>
        <?= $value->title ?>
    </div>
<?php endforeach ;?>
<?php $this->layout("layout", ["title" => "HomePage"]); ?>

<?php $this->start("main") ?>

<h1>Welcome to Home Page</h1>

<?php if (is_array($blogs)): ?>
    <!-- Loop Here -->
    <h1>IS ARRAY</h1>

    <?php foreach ($blogs as $blog): ?>
        <div><?= $blog['title'] ?></div>
        <br>
        <div><?= $blog['excerpt'] ?></div>
        <br>
        <div><?= $blog['author'] ?></div>
        <br>
        <div><?= $blog['body'] ?></div>
        <hr>
    <?php endforeach; ?>
<?php else: ?>
    <h2>No Data here</h2>
<?php endif; ?>

<?php $this->stop() ?>
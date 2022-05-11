
<?php 
/** @var $this \app\core\View */
$this->title = 'Contact';
?>

<h1>Contact</h1>

<div class="container">
    <div class="container mb-3">
        <form action="" method="POST">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
        <input type="submit">
        </form>
    </div>
</div>
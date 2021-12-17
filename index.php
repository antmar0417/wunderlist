<?php $errors = [];

$quotes = [
    ['name' => 'Anton', 'quote' => 'Bil'],
    ['name' => 'Ivan', 'quote' => 'Teater'],
];

if (isset($_POST['name'], $_POST['quote'])) {

    $name = trim($_POST['name']);
    $quote = trim($_POST['quote']);

    if ($name === '') {
        $errors[] = 'You need to fill a name';
    }
    if ($quote === '') {
        $errors[] = 'Please add content into the field';
    }
    if (count($errors) === 0) {
        $quotes[] = [
            'name' => $name,
            'quote' => $quote
        ];
    }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wunderlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
</head>

<body>
    <main>
        <div class="row mt-4">
            <div class="col-lg-8 offset-lg-2">
                <h1>Quotes</h1>
                <?php foreach ($quotes as $quote) : ?>
                    <small><?= htmlspecialchars($quote['name']) ?></small>
                    <p><?= htmlspecialchars($quote['quote']) ?></p>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <form class="col-lg-8 offset-lg-2" action="/index.php" method="post">
                    <?php foreach ($errors as $error) : ?>
                        <div class="alert alert-danger">
                            <strong><?= $error ?></strong>
                        </div>
                    <?php endforeach; ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" />
                    </div>
                    <div class="mb-3">
                        <label for="quote" class="form-label">Quote</label>
                        <textarea name="quote" id="quote" class="form-control"></textarea>
                        <br />

                        <button type="submit" class="btn btn-primary">
                            Add your quote
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>

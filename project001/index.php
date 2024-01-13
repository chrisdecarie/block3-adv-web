

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 01: Pet Products Home</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <figure>
        <img src="./images/finnboo.jpg" alt="Image of my kitty Finn Peek-A-Boo">
    </figure>
</header>
    <main>

        <section>
            <article class="title">
                <h1>Aysegul Aksu: Project01</h1>
                <h2>Pet Products</h2>
            </article>
            <article>
                <h2>Notes</h2>
                <p>Please add an item (type/category/brand/product) that is not on the list. Users cannot add an existing item.</p>
<p>Items (type/category/brand/product) associated with other items cannot be deleted.</p>
                <p>It seems success and error messages are displayed based on relevance, and it repeats on all relevant tables and I could not figure out a solution for that yet.</p>
            </article>
            <article>
            <?php

                // Start the session
                session_start();

            // Include controllers, models, and views
            require_once 'controllers/main-controller.php';
?>
                <!-- Content handled by the controllers and views -->
            </article>

        </section>
    </main>
</body>

</html>

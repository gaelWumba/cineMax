<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&family=Poppins:wght@600;700&family=Space+Mono&display=swap" rel="stylesheet">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    <link rel="stylesheet" href="style.css">
    <title>My cinema</title>
</head>
<body data-theme="dark">
    <?php
        include('script.php');
    ?>
    <header>
        <div class="icons">
            <img class="cine" src="icon/cine.png" alt="">
            <img class="pop" src="icon/pop.png" alt="">

            <img class="king" src="icon/king.png" alt="">
            <img class="neon" src="img/cinema_neon.jpg" alt="">

            <img class="enjoy" src="icon/enjoy.png" alt="">
            <img class="ticks" src="icon/tickects.png" alt="">   
        </div>
    </header>
    <main>
        <section class="users_search input_search">
            <form action="" method="$_GET">
                 <div class="input-group mb-3 justify-content-center">
                    <input type="text" name="usersSearch" class="form-input search_users" id="users_search" placeholder="Users search...">
                    <button type="submit" class="btn btn_submit btn_search_users" id="btn_search_users" name="btn_search_prenom">Find user</button>
                </div>
            </form>
            <form action="" method="$_GET">
                <div class="input-group mb-3 justify-content-center ">
                    <input type="text" name="search_genre" class="form-input search_genre" placeholder="Genre..."> 
                    <button type="submit" class="btn btn_submit btn_search_genre" name="btn_search_genre">Genre</button> 
                </div>
            </form>
            <form action="" method="$_GET">
                <div class="input-group mb-3 justify-content-center ">
                    <input type="text" name="searchDistributor" class="form-input search_distributor" placeholder="Distributor..."> 
                    <button type="submit" class="btn btn_submit btn_search_distributor" name="btn_search_distributor">Distributor</button> 
                </div>
            </form>
            <form action="" method="$_GET">
                <div class="input-group mb-3 justify-content-center ">
                    <input type="text" name="searchMovie" class="form-input search_movie" placeholder="Movie...">
                    <button type="submit" class="btn btn_submit btn_search_movie" name="btn_search_movie">Movie</button> 
                </div>
            </form>  
        </section>
        <article>
            <div>
                <?php
                    if(isset($_GET['btn_search_prenom']) || isset($_GET['btn_search_nom'])){
                ?>
                <table class="table table-dark table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Subscription</th>
                            <th scope="col">Profil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $val){
                            ?>
                        <tr>
                            <td><?= $val['id']; ?></td>
                            <td><?= $val['firstname']; ?></td>
                            <td><?= $val['lastname']; ?></td>
                            <td><?= $val['name']; ?></td>

                            <td><button name="btn-infos" class="btn btn-outline-info" id="outline-info" value="<?= $val['id']; ?>">Info</button></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <nav aria-label="page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                        <a class="page-link" href="index.php?usersSearch=&btn_search_prenom=&page=<?=$previous; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                        <?php for ($i=max($start - 5, 1); $i<=max(5, min($start, $pages + 5)); $i++) : ?>
                        <li class="page-item"><a class="page-link" href="index.php?usersSearch=&btn_search_prenom=&page=<?=$i; ?>"><?= $i; ?></a></li>
                        <?php endfor ?>

                        <li class="page-item">
                            <a class="page-link" href="index.php?usersSearch=&btn_search_prenom=<?=$next; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php } ?> 
            </div>
            <div>
            <div class="needs-validation">
                <table class="table table-dark table-striped">
                    <thead>
                            <tr>
                                <th scope="col">
                                    <select class="form-select" id="validationTooltip04" required>
                                    <option selected disabled value="" desabled>Subscription</option>
                                    <option>VIP</option>
                                    <option>GOLD</option>
                                    <option>CLASSIC</option>
                                    <option>PASS DAY</option>
                                    </select>
                                </th>
                                <th scope="col">ACTION</th>
                                <th scope="col">STORY</th>
                            </tr>
                        <tbody>
                            <tr>
                                <td><?= $val['name']; ?></td>
                                <td>
                                    <form action="" method="$_GET">
                                        <div class="input-group mb-3 justify-content-center">
                                            <button class="btn btn-success" name="btn-add">ADD</button>
                                            <button class="btn btn-danger" name="btn-delete" value="<?= $val['id']; ?>">DELETE</button> 
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </thead>
                </table>
            </div>
            </div>
            <div>
                <?php
                    if(isset($_GET['btn_search_movie']) || isset($_GET['btn_search_distributor']) || isset($_GET['btn_search_genre'])){
                ?>
                <table class="table table-dark table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">director</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Distributor</th>
                          </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $val){
                            ?>
                        <tr>
                            <td><?= $val['id']; ?></td>
                            <td><?= $val['title']; ?></td>
                            <td><?= $val['director']; ?></td>
                            <td><?= $val['rating']; ?></td>
                            <td><?= $val['GENRE']; ?></td>
                            <td><?= $val['name']; ?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <nav aria-label="page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="index.php?searchMovie=&btn_search_movie=&page=<?=$previous; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php for ($i=max($start - 5, 1); $i<=max(5, min($start, $pages + 5)); $i++) : ?>
                        <li class="page-item"><a class="page-link" href="index.php?searchMovie=&btn_search_movie=&page=<?=$i; ?>"><?= $i; ?></a></li>
                        <?php endfor ?>

                        <li class="page-item">
                            <a class="page-link" href="index.php?searchMovie=&btn_search_movie=&page=<?=$next; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php } ?> 
            </div>
        </article>
    </main>
    <script src="script.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>
</html>
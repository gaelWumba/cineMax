<?php
    $username = 'gael';
    $password = 'root';

    try{
        $connect = new PDO('mysql:host=localhost;dbname=cinema;port:3306',$username,$password);
        $query = "select name from genre";
                
    }catch(PDOException $e){
        print "Error!:" . $e->getMessage();
    }

/* Recherche d'utilisateur */

    if(isset($_GET['usersSearch'])){
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $usersSearch = $_GET['usersSearch'];
        $query = "SELECT user.id, user.firstname, user.lastname, user.email, user.city, user.zipcode, user.country, subscription.name FROM user 
                left join membership on user.id = membership.id_user 
                left join subscription on membership.id_subscription = subscription.id 
                WHERE firstname like '%$usersSearch%' OR lastname like '%$usersSearch%' LIMIT $start, $limit";
        $result = $connect->query($query);

        $result1 = $connect->query("SELECT count(*) FROM user");
        $count = $result1->fetchColumn();
        $pages = ceil($count / $limit);
        $previous = $page -1;
        $next = $page + 1;
    }   

    /* Pemert d'ajouter un abonnement a un utilisateur */
 /*    if(isset($_GET['btn-delete'])){
        $delete = $_GET['btn-delete'];
        $query = "UPDATE subscription.name from user 
        left join membership on user.id = membership.id_user 
        left join subscription on membership.id_subscription = subscription.id
        set subscription.name = NULL
        where user.id = $delete";
        $result = $connect->query($query);
    }
 */

/* Recherche de films */
    if(isset($_GET['searchMovie'])){
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $str = $_GET['searchMovie'];
        $query = "SELECT genre.name as 'GENRE', movie.id, movie.title, movie.director, distributor.name, movie.rating  from movie_genre 
                inner join genre on genre.id = movie_genre.id_genre 
                inner join movie on movie.id = movie_genre.id_movie 
                inner join distributor on distributor.id = id_distributor 
                WHERE title like '%$str%' LIMIT $start, $limit";
        $result = $connect->query($query);  

        $result1 = $connect->query("SELECT count(*) FROM movie");
        $count = $result1->fetchColumn();
        $pages = ceil($count / $limit);
        $previous = $page -1;
        $next = $page + 1;    
    }

/* Recherche par genre */
    if(isset($_GET['search_genre'])){
















































        
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $optionListe = $_GET['search_genre'];
        $query = "SELECT genre.name as 'GENRE', movie.id, movie.title, movie.director, distributor.name, movie.rating from movie_genre 
                inner join genre on genre.id = movie_genre.id_genre 
                inner join movie on movie.id = movie_genre.id_movie 
                inner join distributor on distributor.id = id_distributor
                WHERE genre.name LIKE '%$optionListe%' LIMIT $start, $limit";
        $result = $connect->query($query);  

        $result1 = $connect->query("SELECT count(*) FROM movie");
        $count = $result1->fetchColumn();
        $pages = ceil($count / $limit);
        $previous = $page - 1;
        $next = $page + 1;
    }

/* Recherche par distributeur */
    if(isset($_GET['searchDistributor'])){
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $distributor = $_GET['searchDistributor'];
        $query = "SELECT genre.name as 'GENRE', movie.id, movie.title, movie.director, distributor.name, movie.rating from movie_genre 
                inner join genre on genre.id = movie_genre.id_genre 
                inner join movie on movie.id = movie_genre.id_movie 
                inner join distributor on distributor.id = id_distributor 
                WHERE distributor.name LIKE '%$distributor%' LIMIT $start, $limit";
        $result = $connect->query($query); 

        $result1 = $connect->query("SELECT count(*) FROM movie");
        $count = $result1->fetchColumn();
        $pages = ceil($count / $limit);
        $previous = $page - 1;
        $next = $page + 1;
    }

?>
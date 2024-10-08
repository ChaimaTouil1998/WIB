<?php
function connect(){
    
    $servername = "";

    $DBuser = "root";
    
    $DBpassword = "";
    
    $DBname = "ms_wib";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
    //php end
    
}



function getAllCategories()
{
    $conn = connect();
    // Création de la requete 

    $requete = "SELECT * FROM categories";

    // execution de la requete 
    $resultat = $conn->query($requete);

    //resultat de la requete
    $categories = $resultat->fetchAll();

    //var_dump($categories)
    return $categories;
}


function getAllProducts()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM produits";

    // execution de la requete 
    $resultat = $conn->query($requete);

    //resultat de la requete
    $produits = $resultat->fetchAll();

    //var_dump($categories)
    return $produits;
}



function getAllProductsNouveautés()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM nouveautés";

    // execution de la requete 
    $resultat = $conn->query($requete);

    //resultat de la requete
    $produitsNouveautés = $resultat->fetchAll();

    //var_dump($categories)
    return $produitsNouveautés;
}



function getProduitsByCategorie(){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT * FROM produits ";

     //3- exécution de la requête
     $resultat = $conn -> query($requete);

     //4- resultat
     $produitcat = $resultat -> fetch();
 
     return $produitcat;
}


function getAllProductsfourbureau()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM fourbureau";

    // execution de la requete 
    $resultat = $conn->query($requete);

    //resultat de la requete
    $produitsfourbureau = $resultat->fetchAll();

    //var_dump($categories)
    return $produitsfourbureau;
}


function getAllProductsfourScolaire()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM fourScolaire";

    // execution de la requete 
    $resultat = $conn->query($requete);

    //resultat de la requete
    $produitsfourScolaire = $resultat->fetchAll();

    //var_dump($categories)
    return $produitsfourScolaire;
}

function getAllProductsPromotions()
{
    //connexion base de données
   $conn = connect();

    // Création de la requete 

    $requete = "SELECT * FROM promotions";

    // execution de la requete 
    $resultat = $conn->query($requete);

    //resultat de la requete
    $produitsPromotions = $resultat->fetchAll();

    //var_dump($categories)
    return $produitsPromotions;
}


function AddVisiteur($data)
{

  //connexion base de données
  $conn = connect();

    // Hashage de Mot de passe
    $mphash = md5($data['mp']);

    $requete = "INSERT INTO visiteurs(nom,prenom,adresse,email,mp,telephone,date) 
    VALUES ('" . $data['nom'] . "','" . $data['prenom'] . "','" . $data["adresse"] . "','" . $data['email'] . "',
    '" . $mphash . "','" . $data["telephone"] . "', '" . $data["date"] . "')";

    $resultat = $conn->query($requete);

    if ($resultat) {
        return true;
    } else {
        return false;
    }
}

function ConnectVisiteur($data)
{

    //connexion base de données
    $conn = connect();

    $email = $data['email'];
    $mp = md5($data['mp']);
    $requete = "SELECT * FROM visiteurs WHERE email= '$email' AND mp ='$mp'";

    $resultat = $conn->query($requete);

    $user = $resultat->fetch();

    return $user;
}

function searchProduits($keyword)
{

    //connexion base de données
    $conn = connect();

    //2-Création de la requête
    $requete = "SELECT * FROM produits WHERE nom LIKE '%$keyword%' ";

    //3- exécution de la requête
    $resultat = $conn->query($requete);

    //4- resultat
    $produits = $resultat->fetchAll();

    return $produits;
}

function searchProduitsNouveautés($keywords)
{

    $conn = connect();

    //2-Création de la requête
    $requete = "SELECT * FROM nouveautés WHERE nom LIKE '%$keywords%' ";

    //3- exécution de la requête
    $resultat = $conn->query($requete);

    //4- resultat
    $poductsNouveautés = $resultat->fetchAll();

    return $poductsNouveautés;
}






function searchProduitsBur($keywords)
{

    $conn = connect();

    //2-Création de la requête
    $requete = "SELECT * FROM fourbureau WHERE nom LIKE '%$keywords%' ";

    //3- exécution de la requête
    $resultat = $conn->query($requete);

    //4- resultat
    $poductsBur = $resultat->fetchAll();

    return $poductsBur;
}
function searchProduitsPromotions($keywords)
{

    $conn = connect();

    //2-Création de la requête
    $requete = "SELECT * FROM promotions WHERE nom LIKE '%$keywords%' ";

    //3- exécution de la requête
    $resultat = $conn->query($requete);

    //4- resultat
    $poductsPromotions = $resultat->fetchAll();

    return $poductsPromotions;
}



function ConnectAdmin($data)
{

    $conn = connect();


    $email = $data['email'];
    $mp= md5($data['mp']);
    $requete = "SELECT * FROM administrateur WHERE email= '$email' AND mp ='$mp'";

    $resultat = $conn->query($requete);

    $user = $resultat->fetch();

    return $user;




    
}
function UpdateStock($data){
     $conn = connect();

        //1- creation de la requete 
        $requete = "SELECT s.id,p.nom,s.quantite FROM produits p, stocks s WHERE p.id = s.produit";

        //3- exécution de la requête
        $resultat = $conn -> query($requete);
   
        $stocks = $resultat ->fetchAll();

        return $stocks; 
}
function getProduitById($id){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT * FROM produits WHERE id=$id";

     //3- exécution de la requête
     $resultat = $conn -> query($requete);

     //4- resultat
     $produit = $resultat -> fetch();
 
     return $produit;
}

function getPromotionsById($id){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT * FROM promotions WHERE id=$id";

     //3- exécution de la requête
     $resultat = $conn -> query($requete);

     //4- resultat
     $promotions = $resultat -> fetch();
 
     return $promotions;
}


function getNouveautésById($id){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT * FROM nouveautés WHERE id=$id";

     //3- exécution de la requête
     $resultat = $conn -> query($requete);

     //4- resultat
     $nouveautés = $resultat -> fetch();
 
     return $nouveautés;
}

function getFourBureauById($id){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT * FROM fourbureau WHERE id=$id";

     //3- exécution de la requête
     $resultat = $conn -> query($requete);

     //4- resultat
     $bureau = $resultat -> fetch();
 
     return $bureau;
}
function getFourScolaireById($id){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT * FROM fourScolaire WHERE id=$id";

     //3- exécution de la requête
     $resultat = $conn -> query($requete);

     //4- resultat
     $scolaire = $resultat -> fetch();
 
     return $scolaire;
}
function getAllUsers(){
    $conn = connect();

        //1- creation de la requete 
        $requete = "SELECT * FROM visiteurs WHERE etat=0";

        //3- exécution de la requête
        $resultat = $conn -> query($requete);
   
        $users = $resultat ->fetchAll();

        return $users; 
}

function getStocks(){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT s.id,p.nom,s.quantite FROM produits p , stocks s WHERE p.id = s.categorie";

    //3- exécution de la requête
    $resultat = $conn -> query($requete);

    $stocks = $resultat ->fetchAll();

    return $stocks; 
}
function getProdByCat(){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT p.id,c.nom,p.prix FROM categories c , produits p WHERE c.id = p.categorie";

    //3- exécution de la requête
    $resultat = $conn -> query($requete);

    $stocks = $resultat ->fetchAll();

    return $stocks; 
}

function getStocksNouveautés(){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT s.id,p.nom,s.quantite FROM nouveautés p , stocksN s WHERE p.id = s.nouveauté";

    //3- exécution de la requête
    $resultat = $conn -> query($requete);

    $stocksN = $resultat ->fetchAll();

    return $stocksN; 
}

function getStocksPromotions(){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT s.id,p.nom,s.quantite FROM promotions p , stocksP s WHERE p.id = s.promotion";

    //3- exécution de la requête
    $resultat = $conn -> query($requete);

    $stocksP = $resultat ->fetchAll();

    return $stocksP; 
}
function getAllPaniers(){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT v.nom , v.prenom,v.telephone,p.total,p.etat, p.date_creation , p.id FROM paniers p, visiteurs v WHERE p.visiteur = v.id";

    //3- exécution de la requête
    $resultat = $conn -> query($requete);

    $commandes = $resultat ->fetchAll();

    return $commandes; 
}
function getAllCommandes(){
    $conn = connect();

    //1- creation de la requete 
    $requete = "SELECT p.nom , p.image, c.quantite, c.total, c.panier  FROM commandes c, produits p WHERE c.produit = p.id";

    //3- exécution de la requête
    $resultat = $conn -> query($requete);

    $commandes = $resultat ->fetchAll();

    return $commandes; 
}


function getProductByCategorie(){
    $conn = connect();
    //1- creation de la requete 
    
    $requete = "SELECT p.nom FROM categories c JOIN produits p ON p.categorie = c.id WHERE c.id =8";

    //3- exécution de la requête
    $resultat = $conn -> query($requete);

    $produitCategorie = $resultat ->fetchAll();

    return $produitCategorie; 
}

function changerEtatPanier($data){
    $conn = connect();

    $requete = "UPDATE paniers SET etat ='".$data['etat']."'WHERE id='".$data['panier_id']."'";

    $resultat = $conn -> query($requete);
    
    return $resultat; 

}
function getPaniersByEtat($paniers,$etat){
    $paniersEtat =array();
    foreach($paniers as $p){
        if($p['etat'] == $etat){
            array_push($paniersEtat,$p);
        }
    }
    return $paniersEtat;
}


function getData(){
    
    $data = array();
    $conn = connect();

    //Calculer le nbre des produits dans la base
    $requeteProd = "SELECT COUNT(*) from produits";
    $resultatProd = $conn->query($requeteProd);
    $nbrProd = $resultatProd->fetch();


    //Calculer le nbre des catégories dans la base
    $requeteCat = "SELECT COUNT(*) from categories";
     $resultatCat=$conn->query($requeteCat);
     $nbrCat = $resultatCat->fetch();

    //Calculer le nbre des Visiteurs dans la base
     $requeteVis = "SELECT COUNT(*) from visiteurs";
    $resultatVis =$conn->query($requeteVis);
    $nbrClients = $resultatVis->fetch();


    $data["produits"] = $nbrProd[0];
    $data["categories"] = $nbrCat[0];
    $data["clients"] = $nbrClients[0];

    return $data;


}

function EditAdmin($data){
    $conn = connect();
    
    if ($data['mp'] !=""){
        $requete = "UPDATE administrateur SET nom ='".$data['nom']."',email='".$data['email']."',mp='".md5($data['mp'])."' WHERE id= '".$data['id_admin']."'";
    }else{
        $requete = "UPDATE administrateur SET nom ='".$data['nom']."',email='".$data['email']."' WHERE id= '".$data['id_admin']."'";
    
    }
    $resultat = $conn->query($requete);
    return true;
    }
    
    function EditUser($data){
        $conn = connect();
        
        if ($data['mp'] !=""){
            $requete = "UPDATE visiteurs SET telephone ='".$data['telephone']."',email='".$data['email']."',mp='".md5($data['mp'])."' WHERE id= '".$data['id']."'";
        }else{
            $requete = "UPDATE administrateur SET nom ='".$data['nom']."',email='".$data['email']."' WHERE id= '".$data['id']."'";
        
        }
        $resultat = $conn->query($requete);
        return true;
        }
?>


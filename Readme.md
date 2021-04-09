# auteur

omar sene, entrepreneur numérique fondateur de myeva.co Etudes digitales
myeva.co est une société de services informatiques axées sur les processus métiers d'entreprise.

## client/proprietaire

Service Régional des Pêches et de la Surveillance de Sedhiou

## Description

Application web de gestion et suivi-évaluation des actes de délivrance des permis de pêche dans la régon de Sedhiou

## installation

deployement sur Heroku prévu
configurer la base de données avant tout
$_dbconfig {
    _dbserver : "localhost",
    _dbname : "srpechessedhiou",
    _dbuser : "root",
    _dbpw : ""
}
Pour configurer l'accès à distance il faut connaître l'adresse IP www.srpechessedhiou.com
modifier le fichier C:\Windows\System32\Drivers\ect\hosts
192.168.1.8 www.srpechessedhiou.com
modifier le fichier http.xampp.config
Allow all grant

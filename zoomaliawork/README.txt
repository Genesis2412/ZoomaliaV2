*******************Start************************************
Brief

Zoomalia is here to promote adoption, to ease veterinary 
services and to help us(donation) to nurture these pets in 
our facility till someone comes to adopt them.

************************************************************

Folder video-consists video for the slider in index.php

css folder-consists all styling for the webpages

img folder-consists all the image for the webpages

************************************************************

connection.php-all connection of database is done here

logout.php-destroy all sessions

create.sql-all sql codes

****NOTE****************************************************

Create a database named Zoomalia on a localhost
Codes are found in create.sql

//////////////////////NEW PAGES/////////////////////////////
api folder(rest api)
    .htaccess - redirection of url
    config.php -  create class Database
    create.php - to create new dog and cats
    delete.php - to delete cats and dogs
    read.php - the details of all the dogs and cats are fetched
    readOne.php - the details of one dog and one cat is fetched
    update.php - the dog or cat is updated


adminPage.php - displays main admin page
adminLogin.php - login page
adminLoginCheck.php - login authentication for admins
adminLogout.php - ends the session for the admin

****Existing****
addToFavorites.php - add selected dog into favorites
apiViewDog.php - selects only one dog and its details
dogCatalogue.php - display the dogs
getFavorites.php - list the favorites list

****New****
adoptCat.php - displays all the cats to be adopted
adoptDog.php - displays all the dogs to be adopted
viewPet.php - displays one pet and its form
adoptRequest.php - post the values in database and set the pet taken

adminCat.php - displays all the cats in a table
adminDog.php - displays all the dogs in a table
adminDeletePet.php - deletes the dogs or cat
adminUpdatePet.php - updates the value of a selected pet
adminNewPet.php - displays the form for the to add new pets
adminAddPet.php - post values and create new pet

*************************SOAP******************************

veterinary.php - displays the veterinary services

****Existing****
branchClient.php - takes the country code then check if available in database then displays


****New****
breedServer.php - the wsdl is configured and the value is posted then returned
breedForm.php - takes the values to be posted to the wsdl
breedClient - displayed the returned value from the wsdl


//////////////////////OLD PAGES/////////////////////////////

index.php-homepage of website

messageCheck.php-validate fields & check if message is sent

************************************************************

donate.php-form of donation

submit.php-validate details and insert the details of donor

************************************************************

veterinary.php-display all veterinary facilities available

************************************************************

register.php-Register form(display message if email valid 
or not)

checkemail.php-AJAX validation to check email

registerCheck.php-insert details in database(password md5 
encryption)

************************************************************

login.php-login form(display if email/password wrong)

loginCheck.php-validate email and password using header..

************************************************************

donateSelect.php-display details if had done donation or 
not

************************************************************
THANK YOU FOR YOUR TIME

Credits:
Name:Keerti Jhummun 
ID:1912253
Name:Pandoo Hiresh 
ID:1910196

****************************END*****************************


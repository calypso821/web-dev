## Web application
Spletna aplikacija je izdelana v PHP in MySQL podatkovno bazo. Za izgled sem si pomaga z Bootstrap frameworkom ki omogoča lažje in hitreje oblikovanje strani. Pri funkcionalnosti strani sem si pomagal z Vue apijem, uporabljen pri iskanju, filtriranju in sortiranje projektov za prikaz. Ajax poizvedbe pa sem pošiljal z axios apijem. Za pošiljanje mailov sem uporabil knjiznjico PHPMailer (direktorij – phpmailer1). PHP funkcija ‘mail’ potrebuje lokalni mail server za pošiljanje mailov, PHPMailer pa deluje preko SMTP z avtentikacijo. Poišljanje mailov poteka preko maila spletne strani (webproject209@gmail.com.) Vse uporabnikove vnose sem validiral na strani odjemalca in prav tako na strani strežnika.

## Delovanje
Normalni uporabnik (brez računa)
- brskanje po objavljenih porjektih na spletni strani
- filtiranja po kategorijah (WebDev, GameDev, Data Mining…)
- iskanja po imenu in avtorju projekta
- razvrščanje projektov po (oceni, abecedi, datumu)
- podroben ogleda projekta
- izpolnitev aplikacije za sodelovanje na projektu (avtor projekta je preko maila kontaktiran o zanimanju)
Registriran uporabnik (ima računa)
Potrebna registracija:
- ime (uporaba na spletni strani)
- username in password (potreben pa prijavo v spletno aplikacijo)
- email (potreben za prejemanje aplikacij)
Funkcije:
- vse kar lahko dela normalni uporabnik +
- objavlanje svojih projektov (ime, kategorija, opis, slika)
- urejanje + brisanje svojih projektov
- oseba stran za prikaz svojih projektov (My projects)
- oseba stran za prikaz + spremembe podatkov racuna (Account settings)
- ocenjevanje projektov ostalih uporabnikov (like, dislike)

## Users and passwords

user - pass1234
student - vaje
IronMerc - 1234test


## Knjiznjice 

Osnovno: PHP, HTML, CSS, JS, MySQL

* Bootstrap
* Vue
* jQuery  

* phpmailer - za posiljanje mailov preko gmail racuna

Knjiznjica phpmailer skrbi za posiljanje mailov brez uporabne 
lokalnega mail serverja preko gmail racuna webproject209@gmail.com

INSTALL: "composer require phpmailer/phpmailer"

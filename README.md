# 🎧 DJ-WebApp
Web aplikacija za prikaz događaja, galeriju, kontakt informacije i online rezervacije DJ nastupa.
Izrađeno u HTML, CSS, PHP, MySQL okruženju uz WAMP server.

---

## 🔧 Tehnologije

- **HTML5 / CSS3**
- **PHP (proceduralni stil)**
- **MySQL baza podataka**
- **WAMP server**
- jQuery + jQuery UI (datepicker)
- ADO MySQLi konekcija

---

## 🗄️ Struktura baze podataka

Aplikacija koristi MySQL bazu sa sljedećim tabelama:

- `administrator`
- `korisnici`
- `mjesto`
- `dogadjaji`
- `rezervacije`

U projektu se nalazi i eksportovana baza dj.sql (za jednostavnu instalaciju).
---

## ✨ Funkcionalnosti

### 🔐 1. Početna stranica (jayd.html)
- Animirani tekst dobrodošlice.
- Navigacija ka svim modulima aplikacije
- Jednostavan i moderan vizuelni prikaz

---

### 🎵 2. Događaji (events.php)
- Dinamički prikaz događaja iz MySQL baze
- Za svaki događaj se prikazuje:
    -naziv
    -prateća slika
    -datum održavanja
- Automatsko učitavanje kroz PHP + MySQL upit

---

### 📷 3. Galerija (gallery.html)
- Pregled slika događaja i nastupa  
- Prikaz audio zapisa koji se mogu preslušati direktno sa stranice 
- Organizovano u posebnom **/images** i **/audio** direktorijumu  
(Video nije uključen zbog ograničenja GitHub-a.)
---

### 📞 4. Kontakt (contact.html)
- Ikonice za:
   -Facebook
   -Instagram
   -Email
- Klik na ikonicu vodi direktno na JayD profile

---

### 🔐 5. Login sistem (prelogin.php)
Korisnik bira tip prijave:

**Admin login**
- Prijava i registracija administratora 
- Nakon logovanja admin može:
   -pregledati sve korisnike
   -obrisati korisnika
   -izmijeniti korisničke podatke
  
**Korisnički login**
- Registracija i prijava korisnika
- Nakon logovanja, korisnik vidi stranicu za rezervaciju DJ-a
---

### 📅 6. Rezervacija DJ nastupa (afterlogin.php)
Korisnik ispunjava:
- Email 
- Mjesto (dinamički popunjen **combobox** iz baze `mjesto`)
- Tip događaja (**combobox** iz baze `dogadjaji`)
- Datum (jQuery UI datepicker)
Nakon slanja forme:
- rezervacija se upisuje u tabelu `rezervacije`
- korisnik dobija potvrdu o rezervaciji



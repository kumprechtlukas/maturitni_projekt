# Plánované úpravy dat

Dataset: Car Features and MSRP (11 914 řádků, 16 sloupců)

## 1. Odstranění duplicit
V datasetu je 715 řádků, které jsou úplně stejné jako jiný řádek.
Duplicity odstraním, protože by zkreslovaly statistiky (například počet aut nebo průměrnou cenu).

## 2. Doplnění nebo odstranění chybějících hodnot
- **Market Category** – chybí u 3 742 aut. Doplním hodnotu „Neuvedeno“, protože auto prostě nemá zvláštní kategorii.
- **Engine Cylinders** – chybí u 30 aut. Jde o elektroauta a Mazdy RX-7 a RX-8, které mají Wankelův motor bez klasických válců. Doplním 0.
- **Engine Fuel Type** – chybí u 3 aut (Suzuki Verona 2004). Doplním nejčastější hodnotu „regular unleaded“.
- **Engine HP a Number of Doors** – chybí u 75 aut. Tyto hodnoty nejde spolehlivě odhadnout, a protože jde o málo řádků, smažu je.

## 3. Změna datových typů
Sloupce Engine HP, Engine Cylinders a Number of Doors jsou uložené jako desetinná čísla (float),
protože obsahovaly prázdné hodnoty. Po doplnění chybějících hodnot je převedu na celá čísla (int),
protože výkon, počet válců a počet dveří jsou vždy celá čísla.

## 4. Odstranění chybné hodnoty
Audi A6 má v sloupci highway MPG hodnotu 354, což je zjevná chyba (běžná auta mají 20–40).
Tento řádek odstraním.

## 5. Přejmenování sloupců
Názvy sloupců obsahují mezery a různou velikost písmen (např. „Engine HP“, „city mpg“).
Přejmenuji je na jednoduché názvy bez mezer (např. „engine_hp“, „city_mpg“),
aby se s nimi lépe pracovalo v databázi MySQL a v PHP.

## 6. Nový sloupec – spotřeba v l/100 km
Spotřeba je v datasetu v MPG (míle na galon), což se v Česku nepoužívá.
Vytvořím nové sloupce se spotřebou v litrech na 100 km podle vzorce: l/100 km = 235,215 / MPG.
U elektroaut sloupec nechám prázdný, protože nemají spotřebu paliva.

## Poznámka – cena 2 000 USD
Přes 1 000 starších aut má cenu přesně 2 000 USD. Pravděpodobně jde o náhradní hodnotu, protože skutečná cena není známá.
Tato auta v datech ponechám, ale při výpočtu průměrné ceny na to budu brát ohled.
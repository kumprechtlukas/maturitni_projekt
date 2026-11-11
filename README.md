# Maturitní projekt – Zpracování a prezentace dat o automobilech

Webová aplikace, která zpracovává a zobrazuje data o automobilech z datasetu Car Features and MSRP.
Data jsou vyčištěna v Pythonu, uložena do databáze MySQL a zobrazena na webu v PHP.

## Dataset
- **Název:** Car Features and MSRP
- **Zdroj:** https://www.kaggle.com/datasets/CooperUnion/cardataset
- **Počet záznamů:** 11 914
- **Počet sloupců:** 16
- **Obsah:** značka, model, rok výroby, typ paliva, výkon motoru, počet válců, převodovka,
  pohon, počet dveří, kategorie, velikost a typ karoserie, spotřeba, popularita a doporučená cena (MSRP)

## Struktura projektu
| Složka | Obsah |
|---|---|
| `data/raw/` | původní dataset z Kaggle |
| `data/processed/` | vyčištěný dataset připravený pro import do databáze |
| `python/` | skripty pro analýzu a čištění dat |
| `database/` | SQL skripty pro vytvoření a naplnění databáze |
| `web/` | webová aplikace v PHP |
| `docs/` | dokumentace, ER diagram, wireframy, grafy |

## Použité technologie
- Python (Pandas, Matplotlib): analýza a čištění dat
- MySQL (phpMyAdmin): databáze
- PHP (XAMPP): serverová část aplikace
- HTML, CSS, JavaScript: vzhled aplikace
- Git a GitHub: verzování

## Postup
1. Získání datasetu z Kaggle
2. Analýza dat v Pythonu
3. Čištění a úprava dat
4. Import do databáze MySQL
5. Webová aplikace: výpis, vyhledávání, filtrování
6. Statistiky a grafy

## Autor
Lukáš Kumprecht

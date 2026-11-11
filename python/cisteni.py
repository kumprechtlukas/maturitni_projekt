import pandas as pd

df = pd.read_csv("../data/raw/data.csv")
print("Před úpravami:", df.shape)

# 1. odstranění duplicit
df = df.drop_duplicates()

# 2. chybějící hodnoty
df["Market Category"] = df["Market Category"].fillna("Neuvedeno")
df["Engine Cylinders"] = df["Engine Cylinders"].fillna(0)
df["Engine Fuel Type"] = df["Engine Fuel Type"].fillna("regular unleaded")
df = df.dropna(subset=["Engine HP", "Number of Doors"])

# 3. změna datových typů
df["Engine HP"] = df["Engine HP"].astype(int)
df["Engine Cylinders"] = df["Engine Cylinders"].astype(int)
df["Number of Doors"] = df["Number of Doors"].astype(int)

# 4. odstranění chybné hodnoty
df = df[df["highway MPG"] < 200]

# 5. přejmenování sloupců
df.columns = ["brand", "model", "year", "fuel_type", "engine_hp", "engine_cylinders",
              "transmission", "driven_wheels", "doors", "market_category", "vehicle_size",
              "vehicle_style", "highway_mpg", "city_mpg", "popularity", "price"]

# 6. nové sloupce - spotřeba v l/100 km
df["city_l100km"] = round(235.215 / df["city_mpg"], 1)
df["highway_l100km"] = round(235.215 / df["highway_mpg"], 1)
df.loc[df["fuel_type"] == "electric", "city_l100km"] = None
df.loc[df["fuel_type"] == "electric", "highway_l100km"] = None

print("Po úpravách:", df.shape)
print(df.isnull().sum())
print(df.dtypes)

df.to_csv("../data/processed/cars_clean.csv", index=False)
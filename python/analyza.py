import pandas as pd
pd.set_option("display.max_columns", None)

df = pd.read_csv("../data/raw/data.csv")

print(df.shape)
print(df.head())

print(df.dtypes)

print(df.isnull().sum())

print(df.duplicated().sum())

print(df.describe())
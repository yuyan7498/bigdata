import pandas as pd

try:
    df = pd.read_csv("../edu_bigdata_imp1.csv", encoding='big5', low_memory=False)
except:
    print('找不到檔案')


stu71df = df[df["PseudoID"] == 71]
times = pd.Series(pd.to_datetime(stu71df["dp001_review_start_time"].unique()))
dates = times.dt.date.unique()


print(dates)
import pandas as pd

try:
    df = pd.read_csv("../edu_bigdata_imp1.csv", encoding='big5', low_memory=False)
except:
    print('找不到檔案')

stu71df = df[df["PseudoID"] == 71]
paused = stu71df[stu71df["dp001_record_plus_view_action"] == "paused"]

print(len(paused))
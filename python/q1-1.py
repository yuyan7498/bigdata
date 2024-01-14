import pandas as pd
try:
    df = pd.read_csv("../edu_bigdata_imp1.csv", encoding='big5', low_memory=False)
except:
    print('找不到檔案')

stu39 = df[df["PseudoID"] ==39]
ans = stu39["dp001_review_sn"].unique()


print(len(ans))
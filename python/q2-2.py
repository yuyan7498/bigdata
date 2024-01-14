import pandas as pd

try:
    df = pd.read_csv("../edu_bigdata_imp1.csv", encoding='big5', low_memory=False)
except:
    print('找不到檔案')


stu281df = df[df["PseudoID"] == 281]
correct = stu281df[stu281df["dp001_prac_score_rate"] == 100]

print(len(correct))
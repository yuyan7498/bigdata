import pandas as pd

try:
    df = pd.read_csv("../edu_bigdata_imp1.csv", encoding='big5', low_memory=False)
except:
    print('找不到檔案')
    
count = df["dp001_review_sn"].value_counts()
max_count_value = count.idxmax()
max_count = count.max()

print(int(max_count_value))
print("(FREQ:{}) ".format(max_count))
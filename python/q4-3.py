import pandas as pd

try:
    df = pd.read_csv("../edu_bigdata_imp1.csv", encoding='big5', low_memory=False)
except:
    print('找不到檔案')
    
count = df["dp002_verb_display_zh_TW"].value_counts()
top_three_values = count.nlargest(3).index.tolist()

for i in top_three_values:
    print(i)
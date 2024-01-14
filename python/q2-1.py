import pandas as pd
try:
    df = pd.read_csv("../edu_bigdata_imp1.csv", encoding='big5', low_memory=False)
except:
    print('找不到檔案')
    
stu281df = df[df["PseudoID"] == 281]
review_video = stu281df["dp001_review_sn"].unique()

for review_sn in review_video:
    video = stu281df[stu281df['dp001_review_sn'] == review_sn]['dp001_video_item_sn'].unique()
    indicators = stu281df[stu281df['dp001_review_sn'] == review_sn]['dp001_indicator'].unique()
    print("{} --> {}".format(int(video[0]), indicators[0]))
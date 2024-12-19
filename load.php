exp1.
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np

data=pd.read_csv(r"C:\Users\DSU-CSE513-25\Downloads\Housing.csv")

data

print("\n sample data")
print(data.head(15))

print("\n sample data")
print(data.tail(15))

print('The count is:')
print(data.count)

data.isnull()

data.isnull().sum()

print('The shape is:')
print(data.shape)

print("Basic Information:")
print(data.info())

print(data.describe())

data.dtypes

data.columns

data.dropna(inplace=True)

duplicate_rows_df=data[data.duplicated()]
print("Number of duplicate rows:",duplicate_rows_df.shape)

data=data.drop_duplicates()

data.count()

feautures=data.columns
feautures

zero_val_cols=(data[feautures]==0).sum()
zero_val_cols

data.isnull().sum()/len(data)*100

data[['price','area']]=data[['price','area']].replace(0,np.NaN)

data['area']=data['area'].fillna(data.area.median())

exp2.

import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np

data=pd.read_csv(r"C:\Users\DSU-CSE513-25\Downloads\Housing.csv")

data

#One-Hot encoding
one_hot_encoded=pd.get_dummies(data,columns=['mainroad'],prefix=['mainroad'])
print("One-Hot Encoded data:")
print(one_hot_encoded)

from sklearn.preprocessing import LabelEncoder
label_encoder=LabelEncoder()
data['Guestroom_LabelEncoded']=label_encoder.fit_transform(data['guestroom'])
print("\nlabel Encoded data:")
print(data)

plt.figure(figsize=(8,6))
sns.histplot(data['price'],bins=20,kde=True)
plt.title('Distribution of House Prices')
plt.xlabel("price ($)")
plt.ylabel("Frequency")
plt.grid(True)
plt.show()

plt.figure(figsize=(8,6))
sns.boxplot(data=data,x='price')
plt.title('Outliers in House Prices')
plt.xlabel("price ($)")
plt.grid(True)
plt.show()

#Remove the extreme outliers
data=data[data['price']<9000000]

def find_boundaries(variable):
q1=data[variable].quantile(0.25)
q3=data[variable].quantile(0.75)
iqr=q3-q1
lower_boundary=q1-1.5*iqr
upper_boundary=q1+1.5*iqr
return lower_boundary,upper_boundary
lower_price,upper_price=find_boundaries('price')
data.price=np.where(data.price>upper_price,upper_price,data.price)
data.price=np.where(data.price<lower_price,lower_price,data.price)

plt.figure(figsize=(8,6))
sns.boxplot(data=data,x='price')
plt.title('Outliers in House Prices')
plt.xlabel("price ($)")
plt.grid(True)
plt.show()

#calculate correlation matrix
numeric_data=data.select_dtypes(include=[np.number])
correlation_matrix=numeric_data.corr()
print(correlation_matrix)

plt.figure(figsize=(10,8))
sns.heatmap(correlation_matrix,annot=True,cmap='coolwarm')
plt.title("coorelation Matrix")
plt.show()

plt.figure(figsize=(10,6))
sns.scatterplot(data=data, x='area', y='price')
plt.title("House price vs Area")
plt.xlabel("Area")
plt.ylabel("Price ($)")
plt.grid(True)
plt.show()

exp3a
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np

salary_df =pd.read_csv(r"C:\Users\DSU-CSE513-25\Downloads\salary_data (1).csv")

salary_df.shape

salary_df.info()

salary_df.head()

salary_df.describe()

plt.scatter(data=salary_df,x='YearsExperience',y='Salary')
plt.title("Salary based on the years of experience")
plt.xlabel("Years of experience")
plt.ylabel("Salary")
plt.show()

x=salary_df.loc[:, 'YearsExperience'].values
y=salary_df.loc[:, 'Salary'].values

from sklearn.model_selection import train_test_split
x_train,x_test,y_train,y_test=train_test_split(x,y,test_size=0.3,random_state=0)

x_train.shape,x_test.shape,y_train.shape,y_test.shape

type(x_train)

from sklearn.linear_model import LinearRegression

reg_model = LinearRegression()

reg_model.fit(x_train.reshape(-1,1),y_train.reshape(-1,1))

reg_model.coef_

reg_model.intercept_

y_predicted=reg_model.predict(x_test.reshape(-1,1))

y_predicted

y_test

from sklearn.metrics import mean_squared_error, r2_score

r_square=r2_score(y_test,y_predicted)

r_square

from sklearn.metrics import mean_squared_error
mse= mean_squared_error(y_test,y_predicted)
rmse=np.sqrt(mse)

rmse

plt.scatter(x=x_test,y=y_test,color='red')
plt.scatter(x=x_test,y=y_predicted,color='green')
plt.title("Salary Test Vs Predicted")
plt.xlabel("Years of Experience")
plt.ylabel("Salary")
plt.show()

exp3b.
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np

dataset =pd.read_csv(r"C:\Users\DSU-CSE513-25\Downloads\50_Startups.csv")

dataset

dataset.isna().sum()

dataset.info()

x=dataset.drop('Profit',axis=1)
x

y=dataset['Profit']
y

exp4
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
import numpy as np

df=pd.read_csv(r"C:\Users\DSU-CSE513-25\Downloads\Heart.csv")

df.info()

df.head()

df.isnull().sum()

df.describe()

df.columns

df.drop('Unnamed: 0',axis=1,inplace=True)
df.columns

x=df.drop('target',axis=1)
y=df['target']

from sklearn.model_selection import train_test_split
x_train,x_test,y_train,y_test=train_test_split(x,y,test_size=0.2,random_state=42)

from sklearn.linear_model import LogisticRegression
log_clf = LogisticRegression()
log_clf.fit(x_train,y_train)

y_predicted=log_clf.predict(x_test)

y_predicted[0:5]

from sklearn import metrics
conf_mat=metrics.confusion_matrix(y_test,y_predicted)
conf_mat

acc=metrics.accuracy_score(y_test,y_predicted)
prec=metrics.precision_score(y_test,y_predicted)
recall=metrics.recall_score(y_test,y_predicted)
print(f'Accuracy={acc} \nPrecision = {prec}\nRecall={recall}')

plt.title('Confusion Matrix')
sns.heatmap(pd.DataFrame(conf_mat),annot=True,cmap='YlGnBu')
plt.show()

exp5.
import pandas as pd
import seaborn as sns

import warnings
warnings.filterwarnings('ignore')

df=sns.load_dataset('iris')

df.head()

df.size

df.shape

df.species.value_counts()

df.info()

df.describe()

sns.pairplot(data = df,hue='species')

sns.heatmap(df.drop('species',axis=1).corr())

from sklearn.preprocessing import LabelEncoder
le=LabelEncoder()
y=le.fit_transform(df['species'])

y[0:5]

from sklearn.model_selection import train_test_split
x_train,x_test,y_train,y_test=train_test_split(x,y,test_size=0.2,random_state=42)

from sklearn.tree import DecisionTreeClassifier
dtree=DecisionTreeClassifier()
dtree.fit(x_train,y_train)
y_predicted=dtree.predict(x_test)

from sklearn.metrics import classification_report,confusion_matrix
print(confusion_matrix(y_test,y_predicted))

print(classification_report(y_test,y_predicted))

sns.heatmap(pd.DataFrame(confusion_matrix(y_test,y_predicted)),annot=True,cmap='YlGnBu')

from sklearn.tree import plot_tree
plot =plot_tree(decision_tree=dtree,feature_names=df.columns,class_names=["setosa","versicolor","verginica"],filled
